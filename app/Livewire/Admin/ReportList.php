<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Cart;
use Livewire\Component;

class ReportList extends Component
{
    public $date_from, $date_to;

    public function getAnalytics()
    {
        $query = Order::query()
            ->when($this->date_from && $this->date_to, function ($query) {
                $query->whereDate('created_at', '>=', $this->date_from)
                    ->whereDate('created_at', '<=', $this->date_to);
            })
            ->where('status', 'completed');

        // Get daily product sales
        $dailyProductSales = Cart::with('product')
            ->whereHas('order', function($q) use ($query) {
                $q->whereIn('id', $query->clone()->select('id'));
            })
            ->selectRaw('DATE(orders.created_at) as date, SUM(quantity) as total_quantity')
            ->join('orders', 'carts.order_id', '=', 'orders.id')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Ensure we have data for every day in the range
        $start = \Carbon\Carbon::parse($this->date_from);
        $end = \Carbon\Carbon::parse($this->date_to);
        $dateRange = collect();
        
        for ($date = $start; $date->lte($end); $date->addDay()) {
            $salesForDate = $dailyProductSales->firstWhere('date', $date->format('Y-m-d'));
            $dateRange->push([
                'date' => $date->format('Y-m-d') . ' 00:00:00',
                'total' => $salesForDate ? (int) $salesForDate->total_quantity : 0
            ]);
        }

        // Get top selling products with total quantity and revenue
        $topProducts = Cart::with(['product'])
            ->whereHas('order', function($q) use ($query) {
                $q->whereIn('id', $query->clone()->select('id'));
            })
            ->join('orders', 'carts.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->selectRaw('
                product_id, 
                SUM(quantity) as total_quantity,
                SUM(orders.total_amount) as total_revenue,
                COUNT(DISTINCT carts.order_id) as order_count
            ')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get()
            ->map(function($item) {
                return [
                    'name' => $item->product->name,
                    'quantity' => $item->total_quantity,
                    'revenue' => $item->total_revenue,
                    'orders' => $item->order_count
                ];
            });

        // Calculate product categories distribution
        $productCategories = Cart::with('product.category')
            ->whereHas('order', function($q) use ($query) {
                $q->whereIn('id', $query->clone()->select('id'));
            })
            ->selectRaw('
                products.category_id,
                SUM(carts.quantity) as total_quantity
            ')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->groupBy('products.category_id')
            ->orderByDesc('total_quantity')
            ->get()
            ->map(function($item) {
                return [
                    'category' => $item->product->category->name ?? 'Uncategorized',
                    'count' => (int) $item->total_quantity
                ];
            });

        return [
            'dailySales' => $dateRange,
            'topProducts' => $topProducts,
            'productCategories' => $productCategories,
            'summary' => [
                'total_products_sold' => $dateRange->sum('total'),
                'unique_products' => Cart::whereHas('order', function($q) use ($query) {
                    $q->whereIn('id', $query->clone()->select('id'));
                })->distinct('product_id')->count(),
                'total_revenue' => round($query->sum('total_amount'), 2)
            ]
        ];
    }

    public function mount()
    {
        // Default to last 30 days instead of start of month
        $this->date_from = now()->subDays(30)->format('Y-m-d');
        $this->date_to = now()->format('Y-m-d');
    }

    public function updatedDateFrom()
    {
        $this->dispatch('updateCharts', [
            'dailySales' => $this->getAnalytics()['dailySales'],
            'topProducts' => $this->getAnalytics()['topProducts']
        ]);
    }

    public function updatedDateTo()
    {
        $this->dispatch('updateCharts', [
            'dailySales' => $this->getAnalytics()['dailySales'],
            'topProducts' => $this->getAnalytics()['topProducts']
        ]);
    }

    public function render()
    {
        $analytics = $this->getAnalytics();
        $orders = Order::query()
            ->when($this->date_from && $this->date_to, function ($query) {
                $query->whereDate('created_at', '>=', $this->date_from)
                    ->whereDate('created_at', '<=', $this->date_to);
            })
            ->latest()
            ->get();

        return view('livewire.admin.report-list', [
            'analytics' => $analytics,
            'orders' => $orders
        ]);
    }
}

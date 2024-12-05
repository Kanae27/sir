<?php

namespace App\Livewire\Client;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class AllProduct extends Component
{
    use WithPagination;

    public $category_id;
    public $search = '';
    protected $paginationTheme = 'tailwind';

    protected $queryString = ['category_id', 'search'];

    #[On('search-updated')]
    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.pagination.tailwind';
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();
        
        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.client.all-product', [
            'categories' => Category::all(),
            'products' => $query->paginate(12)
        ]);
    }

    public function viewProduct($id)
    {
        return redirect()->route('product-description', $id);
    }

    public function addToCart($productId): void
    {
        if (!Auth::check()) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Please login first before adding to cart');
            redirect()->route('login');
            return;
        }

        if (Auth::user()->email_verified_at === null) {
            redirect('/verify-email');
            return;
        }

        $product = Product::find($productId);
        if (!$product) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Product not found');
            return;
        }

        if ($product->quantity <= 0) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Product is out of stock');
            return;
        }

        try {
            $cart = Cart::where('order_id', null)
                ->where('product_id', $productId)
                ->where('user_id', Auth::id())
                ->first();

            if ($cart) {
                if ($cart->quantity >= $product->quantity) {
                    notyf()
                        ->position('x', 'right')
                        ->position('y', 'top')
                        ->error('Cannot add more items. Stock limit reached.');
                    return;
                }

                $cart->update([
                    'quantity' => $cart->quantity + 1
                ]);
            } else {
                Cart::create([
                    'product_id' => $productId,
                    'quantity' => 1,
                    'user_id' => Auth::id()
                ]);
            }

            $this->dispatch('total_cart');
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->success('Item has been added to your shopping cart');
        } catch (\Exception $e) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Error adding item to cart: ' . $e->getMessage());
        }
    }
}

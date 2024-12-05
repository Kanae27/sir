<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Order;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Livewire\Component;
use Flasher\Notyf\Prime\NotyfInterface;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CartList extends Component implements HasForms
{
    use InteractsWithForms;
    public $carts;
    public $selectedItems = [];
    public $quantities = [];
    public $total = 0;
    public $selectAll = false;

    public $payment_method, $proof = [];

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->carts = Cart::where('user_id', Auth::id())
            ->where('order_id', null)
            ->get();

        // Initialize quantities for each cart item
        foreach ($this->carts as $item) {
            $this->quantities[$item->id] = $item->quantity;
        }

        $this->calculateTotal();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('payment_method')
                    ->options([
                        'payment_center' => 'Payment Center / E-Wallet',
                        'online_banking' => 'Online Banking',
                        'cod' => 'Cash On Delivery'
                    ])
                    ->live(),
                FileUpload::make('proof')
                    ->visible(fn() => !empty($this->payment_method) && $this->payment_method !== 'cod')
            ]);
    }

    public function checkOut()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'payment_method' => 'required',
            'selectedItems' => 'required|array|min:1',
        ]);

        if ($this->proof) {
            foreach ($this->proof as $key => $value) {
                $order = Order::create([
                    'total_amount' => $this->total,
                    'user_id' => Auth::id(),
                    'payment_method' => $this->payment_method,
                    'proof_of_payment' => $value->store('Proof', 'public'),
                ]);

                $selected = Cart::whereIn('id', $this->selectedItems)->get();
                foreach ($selected as $item) {
                    $item->update([
                        'order_id' => $order->id,
                    ]);
                }

                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->success('Order has been checked out successfully');
            }
        } else {
            $order = Order::create([
                'total_amount' => $this->total,
                'user_id' => Auth::id(),
                'payment_method' => $this->payment_method,
            ]);

            $selected = Cart::whereIn('id', $this->selectedItems)->get();
            foreach ($selected as $item) {
                $item->update([
                    'order_id' => $order->id,
                ]);
            }

            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->success('Order has been checked out successfully');
        }

        $this->selectedItems = [];
        $this->payment_method = null;
        $this->proof = [];
        $this->mount();
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedItems = $this->carts->map(function($cart) {
                return (string)$cart->id;
            })->values()->all();
        } else {
            $this->selectedItems = [];
        }
        $this->calculateTotal();
    }

    public function updatedSelectedItems()
    {
        $this->selectAll = !empty($this->carts) && count($this->selectedItems) === $this->carts->count();
        $this->calculateTotal();
    }

    public function increment($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->quantities[$itemId]++;
        $this->calculateTotal();
    }

    public function decrement($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->quantities[$itemId] > 1) {
            $this->quantities[$itemId]--;
            $this->calculateTotal();
        }
    }

    public function removeItem($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        Cart::where('id', $itemId)->delete();
        $this->dispatch('total_cart');
        $this->mount();
    }

    private function calculateTotal()
    {
        $this->total = $this->carts
            ->filter(fn($item) => in_array((string)$item->id, $this->selectedItems))
            ->sum(fn($item) => $item->product->price * $this->quantities[$item->id]);
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('livewire.client.cart-list');
    }
}

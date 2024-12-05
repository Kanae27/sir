<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProductDescription extends Component
{
    use WithPagination;

    public ?int $product_id = null;
    public int $quantity = 1;
    public ?Product $product = null;
    public bool $isAddingToCart = false;

    public function mount(): void
    {
        $this->product_id = request('id');
        if (!$this->product_id) {
            redirect()->route('welcome');
            return;
        }

        $this->product = Product::with('productImages')->find($this->product_id);
        if (!$this->product) {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Product not found');
            redirect()->route('welcome');
            return;
        }
    }

    public function addToCart(): void
    {
        $this->isAddingToCart = true;

        try {
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

            if (!$this->product) {
                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->error('Product not found');
                return;
            }

            if ($this->product->quantity <= 0) {
                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->error('Product is out of stock');
                return;
            }

            $cart = Cart::where('order_id', null)
                ->where('product_id', $this->product_id)
                ->where('user_id', Auth::id())
                ->first();

            if ($cart) {
                if ($cart->quantity >= $this->product->quantity) {
                    notyf()
                        ->position('x', 'right')
                        ->position('y', 'top')
                        ->error('Cannot add more items. Stock limit reached.');
                    return;
                }

                $cart->update([
                    'quantity' => $cart->quantity + $this->quantity
                ]);
            } else {
                Cart::create([
                    'product_id' => $this->product_id,
                    'quantity' => $this->quantity,
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
        } finally {
            $this->isAddingToCart = false;
        }
    }

    public function render(): View
    {
        return view('livewire.client.product-description');
    }

    public function decrement(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function increment(): void
    {
        if ($this->product && $this->quantity < $this->product->quantity) {
            $this->quantity++;
        } else {
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->error('Stock limit reached');
        }
    }
}

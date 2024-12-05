<?php

namespace App\Livewire\Client;

use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FeaturedProduct extends Component
{
    public function render()
    {
        return view('livewire.client.featured-product',[
            'features' => Product::where('is_featured', true)->get()->take(8),
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

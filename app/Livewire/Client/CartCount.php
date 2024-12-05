<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $total = 0;

    #[On('total_cart')]
    public function mount()
    {
        if (Auth::check()) {
            $this->total = Cart::where('user_id', Auth::id())
                ->where('order_id', null)
                ->count();
        }
    }

    public function render()
    {
        return view('livewire.client.cart-count');
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class OnsiteSale extends Component
{
    public $search;
    public $cartItems = [];
    public $subtotal = 0;
public $tax = 0;
public $total = 0;

public function mount()
{
    
}

public function calculateSummary()
{
    $this->subtotal = array_reduce($this->cartItems, function ($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);

    $this->tax = $this->subtotal * 0.12; // Example: 12% tax
    $this->total = $this->subtotal ;
}

    public function render()
    {
        $this->calculateSummary();
        return view('livewire.admin.onsite-sale',[
            'products' => Product::when($this->search, function($record){
                return $record->where('name', 'like', '%'.$this->search.'%');
            })->get()->take(12),
        ]);
    }

    public function getProduct($id){
        $query = Product::where('id', $id)->first();
        $productExists = false;

        if (count($this->cartItems) > 0) {
            foreach ($this->cartItems as $key => $value) {
                if ($value['id'] == $query->id) {
                    // If the product exists, increment the quantity
                    $this->cartItems[$key]['quantity']++;
                    $productExists = true;
                    break; // Exit the loop since the product is found
                }
            }
        }
        if (!$productExists) {
            $this->cartItems[] = [
                'id' => $query->id,
                'name' => $query->name,
                'quantity' => 1,
                'price' => $query->price,
                'image' => $query->productImages->first()->file_path,
            ];
        }
    }

    public function increment($key)
    {
        $this->cartItems[$key]['quantity']++;
        $this->calculateSummary();
    }
    
    public function decrement($key)
    {
        if ($this->cartItems[$key]['quantity'] > 1) {
            $this->cartItems[$key]['quantity']--;
            $this->calculateSummary();
        }
    }
    
    public function removeItem($key)
    {
        unset($this->cartItems[$key]);
        $this->calculateSummary();
    }

    public function checkout(){
        if ($this->cartItems) {
            $ids = array_map(fn($item) => $item['id'], $this->cartItems);
            
            $prods = Product::whereIn('id', $ids)->get();
            foreach ($prods as $key => $value) {
                
            }

            $order =  Order::create([
                'user_id' => auth()->user()->id,
                'total_amount' => $this->total,
                'status' => 'completed',
                'transaction_type' => 'ONSITE'
            ]);
            foreach ($this->cartItems as $key => $value) {
                Cart::create([
                    'product_id' => $value['id'],
                    'quantity' => $value['quantity'],
                    'order_id' => $order->id,
                    'user_id' => auth()->user()->id
                ]);

                $data = Product::where('id',  $value['id'])->first();
                $data->update([
                    'quantity' => $data->quantity - $value['quantity']  // Decrease the quantity of product in stock
                ]);
            }

            
            notyf()->position('x', 'center')
            ->position('y', 'center')->success('Order Check Out Successfully');
            
            return redirect()->route('admin.onsite');

        }else{
            notyf()->position('x', 'center')
            ->position('y', 'center')->error('Item must not be empty');
        }
    }
}

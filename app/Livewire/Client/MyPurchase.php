<?php

namespace App\Livewire\Client;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyPurchase extends Component
{

    public $refund_modal = false;
    public $order_id;
    public $reason;

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('livewire.client.my-purchase',[
            'alls' => Order::where('user_id', Auth::id())->whereIn('status', ['pending', 'completed'])->orderByDesc('created_at')->get(),
            'topays' => Order::where('user_id', Auth::id())->where('status', 'to_pay')->get(),
            'toships' => Order::where('user_id', Auth::id())->where('status', 'to_ship')->get(),
            'toreceive' => Order::where('user_id', Auth::id())->where('status', 'to_receive')->get(),
            'completeds' => Order::where('user_id', Auth::id())->where('status', 'completed')->get(),
            'cancelleds' => Order::where('user_id', Auth::id())->where('status', 'cancelled')->get(),
            'refunds' => Order::where('user_id', Auth::id())->where('status', 'return_refund')->get(),
        ]);
    }

    public function completeOrder($id){
        $data = Order::where('id', $id)->first();
        $data->update([
            'status' => 'completed',
        ]);
    }

    public function cancelOrder($id){
        $data = Order::where('id', $id)->first();
        $data->update([
           'status' => 'cancelled',
        ]);
    }

    public function openModal($id){
        $this->order_id = $id;
        $this->refund_modal = true;
    }

    public function submitRefund(){
        $data = Order::where('id', $this->order_id)->first();
        $data->update([
           'status' => 'return_refund',
           'refund_reason' => $this->reason,
        ]);
        $this->refund_modal = false;
    }
}

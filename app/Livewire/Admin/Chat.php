<?php

namespace App\Livewire\Admin;

use App\Models\ChatMessage;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Flasher\Notyf\Prime\NotyfInterface;

class Chat extends Component
{
    public $user_id;
    public $message;
    public $name;

    public function mount(){
       if (auth()->user()->user_type == 'admin') {
       if (ChatMessage::count() > 0) {
        $data = Order::groupBy('user_id')->get();
        $this->user_id = $data->first()->user_id;
        $this->name = ucfirst($data->first()->user->name);
       }else{
        notyf()->position('x', 'right')
        ->position('y', 'top')->error('No Chat Available..');
        return redirect()->route('admin.dashboard');
       }
       }else{
        $this->user_id = auth()->user()->id;  // Assuming admin has id 1 in the database. Replace with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.  // Replace 1 with actual admin id.
        $this->name = ucfirst(User::where('id', 1)->first()->name);
       }
    }
    public function render()
    {
        return view('livewire.admin.chat',[
            'users' => $this->userGet(),
            'chats' => ChatMessage::where('receiver_id', '=', $this->user_id)->get(),
        ]);
    }

    public function userGet(){
        if (auth()->user()->user_type == 'admin') {
           return Order::groupBy('user_id')->get();
            }else{
             return 1;
    
         }
        }

    public function send(){
            if ($this->message) {
                ChatMessage::create([
                   'sender_id' => auth()->id(),
                   'receiver_id' => $this->user_id,
                   'message' => $this->message,
                ]);
                $this->message = null;
            }
    }
}

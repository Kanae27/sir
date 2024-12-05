<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassword extends Component
{
    public $password;

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('livewire.client.change-password');
    }

    public function save()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Validate the form
        $this->validate([
            'password' => ['required', 'min:8'],
        ]);

        // Update the password in the database using User model
        $user = User::find(Auth::id());
        $user->password = Hash::make($this->password);
        $user->save();

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->success('Password changed successfully');

        return redirect()->route('welcome');
    }
}

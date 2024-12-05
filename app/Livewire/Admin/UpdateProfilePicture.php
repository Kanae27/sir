<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UpdateProfilePicture extends Component
{
    use WithFileUploads;

    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $this->currentPhoto = session('profile_picture');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);

        $path = $this->photo->store('profile-photos', 'public');
        
        // Store in session for now
        session(['profile_picture' => $path]);
        $this->currentPhoto = $path;

        $this->dispatch('profile-picture-updated');
        session()->flash('message', 'Profile picture updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.update-profile-picture');
    }
}

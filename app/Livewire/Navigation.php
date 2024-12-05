<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search-updated', $this->search);
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}

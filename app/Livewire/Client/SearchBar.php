<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;

class SearchBar extends Component
{
    public $search = '';
    public $searchResults = [];

    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $this->searchResults = Product::where('name', 'like', '%' . $this->search . '%')
                ->where('status', 'active')
                ->limit(5)
                ->get();
        } else {
            $this->searchResults = [];
        }
        
        $this->dispatch('search-updated', $this->search);
    }

    public function render()
    {
        return view('livewire.client.search-bar');
    }
}

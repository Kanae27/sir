<div class="w-full max-w-xl">
    <div class="relative w-full">
        <input 
            wire:model.live="search"
            type="text" 
            class="w-full px-4 py-2 pl-10 pr-4 rounded-lg border border-gray-300 bg-white focus:outline-none focus:border-yellow-300 text-gray-800" 
            placeholder="Search products..."
        >
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>

        @if($search && count($searchResults) > 0)
            <div class="absolute z-50 mt-1 w-full bg-white rounded-md shadow-lg">
                <ul class="py-1">
                    @foreach($searchResults as $product)
                        <li>
                            <a href="{{ route('product.show', $product->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ $product->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

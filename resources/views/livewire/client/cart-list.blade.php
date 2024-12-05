<div>
    <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between text-green-600">
            <div class="flex items-center space-x-2">
                <h1 class="font-bold text-2xl">Shopping Cart</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-cart">
                    <circle cx="8" cy="21" r="1" />
                    <circle cx="19" cy="21" r="1" />
                    <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                </svg>
            </div>
            @if(count($carts) > 0)
            <div class="flex items-center space-x-2">
                <input type="checkbox" wire:model.live="selectAll" class="form-checkbox h-5 w-5 text-green-600">
                <span class="text-sm">Select All</span>
            </div>
            @endif
        </div>

        <div class="mt-5">
            <ul class="space-y-3">
                @forelse ($carts as $item)
                    <li class="bg-gray-100 p-5 grid grid-cols-6 gap-2">
                        <div class="flex justify-start items-center">
                            <input type="checkbox" wire:model.live="selectedItems" value="{{ $item->id }}"
                                class="form-checkbox h-5 w-5 text-green-600">
                        </div>
                        <div class="flex justify-start items-center space-x-1">
                            <img src="{{ Storage::url($item->product->productImages->first()->file_path) }}"
                                class="h-16 w-16 object-cover rounded-lg" alt="{{ $item->product->name }}">
                            <div>
                                <p class="text-sm font-medium">{{ $item->product->name }}</p>
                                <p class="text-xs text-gray-500">Stock: {{ $item->product->quantity }}</p>
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                            &#8369;{{ number_format($item->product->price, 2) }}
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="flex text-gray-700">
                                <button wire:click="decrement({{ $item->id }})"
                                    class="border border-gray-700 px-4 text-lg hover:bg-gray-200 transition-colors duration-200">-</button>
                                <input type="text" wire:model.live="quantities.{{ $item->id }}"
                                    value="{{ $item->quantity }}"
                                    class="w-20 text-center font-bold text-green-600 text-sm border-t border-b border-gray-700" 
                                    readonly>
                                <button wire:click="increment({{ $item->id }})"
                                    class="border border-gray-700 px-4 text-lg hover:bg-gray-200 transition-colors duration-200">+</button>
                            </div>
                        </div>
                        <div class="flex justify-center items-center font-medium">
                            &#8369;{{ number_format($item->product->price * ($quantities[$item->id] ?? $item->quantity), 2) }}
                        </div>
                        <div class="flex justify-end">
                            <button wire:click="removeItem({{ $item->id }})" wire:confirm="Are you sure you want to remove this item?"
                                class="text-sm text-red-500 hover:text-red-700 transition-colors duration-200">Remove</button>
                        </div>
                    </li>
                @empty
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="text-gray-400">
                                <circle cx="8" cy="21" r="1" />
                                <circle cx="19" cy="21" r="1" />
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                            </svg>
                        </div>
                        <p class="text-gray-500 text-lg">Your cart is empty!</p>
                        <a href="{{ route('welcome') }}" class="mt-4 inline-flex items-center text-sm font-medium text-green-600 hover:text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="mr-2">
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>

    @if(count($carts) > 0)
    <div class="mx-auto max-w-7xl sticky bottom-0">
        <div class="bg-gray-100 px-10 py-4 flex justify-between shadow-xl">
            <div></div>
            <div class="flex flex-col space-y-3 items-end">
                <div class="w-72">
                    {{ $this->form }}
                </div>
                <div class="flex space-x-4 items-end">
                    <span class="text-2xl text-gray-700">
                        Total (<span class="text-lg">{{ count($selectedItems) }}</span> item(s)):
                        <span class="text-green-600 font-bold">
                            &#8369;{{ number_format($total, 2) }}
                        </span>
                    </span>
                    <x-button 
                        label="Check Out" 
                        squared 
                        class="font-semibold" 
                        :disabled="count($selectedItems) === 0" 
                        positive
                        right-icon="arrow-right" 
                        lg 
                        wire:click="checkOut" 
                        spinner="checkOut" />
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

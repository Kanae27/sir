<div>
    <div class="bg-white p-2">
        <div class="div">
            <x-input placeholder="Search..." wire:model.live="search" />
        </div>
        <div class="my-3 grid grid-cols-6 gap-2">
            @foreach ($products as $item)
                <div wire:click="getProduct({{ $item->id }})" class="border cursor-pointer hover:scale-95 px-2 py-2">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-green-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-basket">
                            <path d="m15 11-1 9" />
                            <path d="m19 11-4-7" />
                            <path d="M2 11h20" />
                            <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
                            <path d="M4.5 15.5h15" />
                            <path d="m5 11 4-7" />
                            <path d="m9 11 1 9" />
                        </svg>
                    </div>
                    <p>{{ $item->name }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-5 grid grid-cols-6 gap-5">
        <!-- Items Section -->
        <div class="col-span-4">
            <div class="flex space-x-2 items-center text-gray-700 font-semibold border-b pb-2">
                <h1 class="text-2xl">Item(s)</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-shopping-basket">
                    <path d="m15 11-1 9" />
                    <path d="m19 11-4-7" />
                    <path d="M2 11h20" />
                    <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4" />
                    <path d="M4.5 15.5h15" />
                    <path d="m5 11 4-7" />
                    <path d="m9 11 1 9" />
                </svg>
            </div>
            <div class="mt-5">
                <ul class="space-y-1">
                    @forelse ($cartItems as $key => $item)
                        <li class="bg-white p-2">
                            <div class="grid grid-cols-5 gap-4 items-center">
                                <!-- Product Info -->
                                <div class="col-span-2 flex items-center space-x-4">
                                    <img src="{{ Storage::url($item['image']) }}"
                                        class="h-14 w-14 object-cover rounded-md" alt="{{ $item['name'] }}">
                                    <div>
                                        <p class="text-sm font-semibold">{{ $item['name'] }}</p>
                                        <p class="text-sm text-gray-600">₱{{ number_format($item['price'], 2) }}</p>
                                    </div>
                                </div>

                                <!-- Quantity Controls -->
                                <div class="flex justify-center">
                                    <div class="flex items-center space-x-2">
                                        <button wire:click="decrement({{ $key }})"
                                            class="border border-gray-400 px-3 py-1 text-lg text-gray-700 hover:bg-gray-200 rounded-md">-</button>
                                        <input type="text" wire:model.lazy="cartItems.{{ $key }}.quantity"
                                            class="w-12 text-center border border-gray-300 rounded-md text-sm focus:outline-none"
                                            min="1">
                                        <button wire:click="increment({{ $key }})"
                                            class="border border-gray-400 px-3 py-1 text-lg text-gray-700 hover:bg-gray-200 rounded-md">+</button>
                                    </div>
                                </div>

                                <!-- Item Total -->
                                <div class="text-right">
                                    <span
                                        class="font-medium text-gray-700">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </div>

                                <!-- Remove Button -->
                                <div class="text-right">
                                    <button wire:click="removeItem({{ $key }})"
                                        class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-trash-2">
                                            <path d="M3 6h18"></path>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" x2="10" y1="11" y2="17"></line>
                                            <line x1="14" x2="14" y1="11" y2="17"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="p-4 text-center text-gray-500">No items in the cart.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-span-2 bg-white p-5 shadow rounded-md">
            <div class="border-b pb-2">
                <h1 class="text-lg font-semibold">Order Summary</h1>
            </div>
            <div class="mt-3 space-y-2">
                <div class="flex justify-between items-center">
                    <p>Subtotal</p>
                    <p>₱{{ number_format($subtotal, 2) }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <p>Tax (12%)</p>
                    <p>₱{{ number_format($tax, 2) }}</p>
                </div>
            </div>
            <div class="mt-3 border-t pt-5">
                <div class="flex justify-between items-center">
                    <p class="font-semibold">Total</p>
                    <p class="font-semibold text-lg">₱{{ number_format($total, 2) }}</p>
                </div>
            </div>
            <div class="mt-5">
                <x-button label="Checkout" rounded class="w-full font-semibold" lg positive wire:click="checkout"
                    spinner="checkout" />
            </div>
        </div>
    </div>

</div>
</div>

<div>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @forelse ($features as $item)
            <div class="group relative border rounded-lg bg-white">
                <div class="relative overflow-hidden rounded-t-lg">
                    <img src="{{ Storage::url($item->productImages->first()->file_path) }}"
                        alt="Front of men's Basic Tee in black."
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover transition-all duration-500 group-hover:opacity-75 group-hover:scale-125 lg:aspect-auto lg:h-80">
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 rounded-t-lg grid place-content-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button wire:click="viewProduct({{ $item->id }})"
                            class="w-14 h-14 rounded-full border border-green-500 text-green-500 bg-white grid place-content-center hover:text-white hover:bg-green-700 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-search">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </button>
                        <button wire:click.stop="addToCart({{ $item->id }})"
                            class="w-14 h-14 rounded-full border border-green-500 text-green-500 bg-white grid place-content-center hover:text-white hover:bg-green-700 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart">
                                <circle cx="8" cy="21" r="1" />
                                <circle cx="19" cy="21" r="1" />
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex justify-between border-t p-2">
                    <div>
                        <h3 class="font-semibold text-gray-700">
                            <a href="#" class="relative">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $item->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">&#8369;{{ number_format($item->price, 2) }}</p>
                    </div>

                </div>
            </div>
        @empty
        @endforelse
    </div>


    <!-- More products... -->
</div>

<div>
    <div class="w-full">
        <div x-data="{
            tabSelected: 1,
            tabId: $id('tabs'),
            tabButtonClicked(tabButton) {
                this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
                this.tabRepositionMarker(tabButton);
            },
            tabRepositionMarker(tabButton) {
                this.$refs.tabMarker.style.width = tabButton.offsetWidth + 'px';
                this.$refs.tabMarker.style.height = tabButton.offsetHeight + 'px';
                this.$refs.tabMarker.style.left = tabButton.offsetLeft + 'px';
            },
            tabContentActive(tabContent) {
                return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
            },
            tabButtonActive(tabContent) {
                const tabId = tabContent.id.split('-').slice(-1);
                return this.tabSelected == tabId;
            }
        }" x-init="tabRepositionMarker($refs.tabButtons.firstElementChild);" class="relative w-full ">

            <div x-ref="tabButtons"
                class="relative inline-grid items-center justify-center w-full h-10 grid-cols-7 p-1 text-gray-500 bg-white border border-gray-400 rounded-lg select-none">
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">All</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">To
                    Pay</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">To
                    Ship</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">To
                    Receive</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Completed</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Cancelled</button>
                <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button"
                    :class="{ 'bg-green-600 text-white': tabButtonActive($el) }"
                    class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3  font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Return
                    Refund</button>
                <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak>
                    <div class="w-full h-full bg-gray-100 rounded-md shadow-sm"></div>
                </div>
            </div>
            <div class="relative  w-full p-5 mt-2  border rounded-md content border-gray-200/70">

                <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
                    <div class="w-full ">
                        <ul class="space-y-3">
                            @forelse ($alls as $item)
                                <li class="bg-gray-100 px-10 py-5">
                                    <div class="flex border-b justify-end text-gray-700 space-x-2">
                                        @if ($item->status == 'completed')
                                            <span>Your order has been delivered</span>
                                        @else
                                            <span>status</span>
                                        @endif
                                        <span>|</span>
                                        @switch($item->status)
                                            @case('pending')
                                                <span class="uppercase text-yellow-500 font-semibold">{{ $item->status }}</span>
                                            @break

                                            @case('completed')
                                                <span class="uppercase text-green-500 font-semibold">{{ $item->status }}</span>
                                            @break

                                            @default
                                        @endswitch
                                    </div>
                                    <div class="mt-3">
                                        <ul class="space-y-2">
                                            @foreach ($item->carts as $cart)
                                                <li class="bg-white px-5 shadow py-2">
                                                    <div class="flex space-x-5 items-center">
                                                        <div class="flex-1 flex space-x-2">
                                                            <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                class="w-12 h-16 object-cover" alt="">
                                                            <div class="text-sm">
                                                                <h1 class="font-semibold text-gray-700 ">
                                                                    {{ $cart->product->name }}
                                                                </h1>
                                                                <p>{{ $cart->product->description }}</p>
                                                                <h1>x{{ $cart->quantity }}</h1>
                                                            </div>
                                                        </div>
                                                        <span class="text-red-500">&#8369;
                                                            {{ $cart->product->price }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                            <span>Order Total:</span> <span
                                                class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                        </div>
                                        <div class="mt-5 flex justify-end space-x-3">
                                            @if ($item->status == 'completed')
                                                <x-button label="Buy Again" squared positive class="font-semibold" />
                                                <x-button label="Contact Seller" squared slate outline
                                                    class="font-semibold" />
                                                <x-button label="Return Refund"
                                                    wire:click="openModal({{ $item->id }})" squared warning outline
                                                    class="font-semibold" />
                                            @endif
                                            @if ($item->status == 'pending')
                                                <x-button label="Cancel Order" squared negative class="font-semibold"
                                                    wire:click="cancelOrder({{ $item->id }})"
                                                    spinner="cancelOrder({{ $item->id }})" />
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>


                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($topays as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <span>waiting to be shipped</span>
                                            <span>|</span>
                                            <span class="uppercase text-green-500 font-semibold">TO PAY</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>


                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($toships as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <div class="flex space-x-1 items-center text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-truck">
                                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                                                    <path d="M15 18H9" />
                                                    <path
                                                        d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
                                                    <circle cx="17" cy="18" r="2" />
                                                    <circle cx="7" cy="18" r="2" />
                                                </svg>
                                                <span>your order has been shipped</span>
                                            </div>
                                            <span>|</span>
                                            <span class="uppercase text-green-500 font-semibold">TO SHIP</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($toreceive as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <div class="flex space-x-1 items-center text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-truck">
                                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                                                    <path d="M15 18H9" />
                                                    <path
                                                        d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
                                                    <circle cx="17" cy="18" r="2" />
                                                    <circle cx="7" cy="18" r="2" />
                                                </svg>
                                                <span>your order has been delivered</span>
                                            </div>
                                            <span>|</span>
                                            <span class="uppercase text-green-500 font-semibold">TO RECEIVE</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif

                                                <x-button label="Complete" right-icon="arrow-right"
                                                    wire:click="completeOrder({{ $item->id }})"
                                                    spinner="completeOrder({{ $item->id }})" squared positive
                                                    class="font-semibold" />
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($completeds as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <div class="flex space-x-1 items-center text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-truck">
                                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                                                    <path d="M15 18H9" />
                                                    <path
                                                        d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
                                                    <circle cx="17" cy="18" r="2" />
                                                    <circle cx="7" cy="18" r="2" />
                                                </svg>
                                                <span>your order has been delivered</span>
                                            </div>
                                            <span>|</span>
                                            <span class="uppercase text-green-500 font-semibold">COMPLETED</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif


                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($cancelleds as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <span></span>
                                            <span>|</span>
                                            <span class="uppercase text-red-500 font-semibold">CANCELLED</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif


                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                        <div class="w-full ">
                            <ul class="space-y-3">
                                @forelse ($refunds as $item)
                                    <li class="bg-gray-100 px-10 py-5">
                                        <div class="flex border-b justify-end text-gray-700 space-x-2">
                                            <span></span>
                                            <span>|</span>
                                            <span class="uppercase text-red-500 font-semibold">RETURN REFUND</span>
                                        </div>
                                        <div class="mt-3">
                                            <ul class="space-y-2">
                                                @foreach ($item->carts as $cart)
                                                    <li class="bg-white px-5 shadow py-2">
                                                        <div class="flex space-x-5 items-center">
                                                            <div class="flex-1 flex space-x-2">
                                                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                                                    class="w-12 h-16 object-cover" alt="">
                                                                <div class="text-sm">
                                                                    <h1 class="font-semibold text-gray-700 ">
                                                                        {{ $cart->product->name }}
                                                                    </h1>
                                                                    <p>{{ $cart->product->description }}</p>
                                                                    <h1>x{{ $cart->quantity }}</h1>
                                                                </div>
                                                            </div>
                                                            <span class="text-red-500">&#8369;
                                                                {{ $cart->product->price }}</span>
                                                        </div>
                                                        <div class="mt-2">
                                                            <span class="text-gray-700">Refund Reason:</span>
                                                            <p>{{ $item->refund_reason }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="mt-1 flex space-x-3 items-end px-5 justify-end">
                                                <span>Order Total:</span> <span
                                                    class="text-2xl text-red-500">&#8369;{{ $item->total_amount }}</span>
                                            </div>
                                            <div class="mt-5 flex justify-end space-x-3">
                                                @if ($item->status == 'completed')
                                                    <x-button label="Buy Again" squared positive class="font-semibold" />
                                                    <x-button label="Contact Seller" squared slate outline
                                                        class="font-semibold" />
                                                @endif


                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <x-shared.no-data />
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <x-modal name="simpleModal" wire:model.defer="refund_modal" align="center">
            <x-card title="Refund Info">
                <div class="w-96">
                    <x-textarea label="Reason" wire:model="reason" />
                </div>

                <x-slot name="footer" class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />

                    <x-button slate squared label="Submit" wire:click="submitRefund" spinner="submitRefund"
                        class="font-semibold" right-icon="arrow-right" />
                </x-slot>
            </x-card>
        </x-modal>
    </div>

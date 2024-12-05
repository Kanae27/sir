<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-10">
        <div class="bg-gray-100 p-6 md:p-6 rounded-2xl " wire:ignore>
            <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper"
                thumbs-swiper=".mySwiper2" loop="true" space-between="10" navigation="true">
                @foreach ($product->productImages as $item)
                    <swiper-slide>
                        <img src="{{ Storage::url($item->file_path) }}" class="h-64 w-full object-cover" />
                    </swiper-slide>
                @endforeach

            </swiper-container>

            <swiper-container class="mySwiper2" loop="true" space-between="10" slides-per-view="4" free-mode="true"
                watch-slides-progress="true">
                @foreach ($product->productImages as $item)
                    <swiper-slide>
                        <img src="{{ Storage::url($item->file_path) }}" class="h-20 w-full object-cover" />
                    </swiper-slide>
                @endforeach

            </swiper-container>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </div>
        <div>
            <div class="bg-gray-100 p-6 md:p-10 rounded-2xl ">
                <div>
                    <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
                    <h1>&#8369;{{ number_format($product->price, 2) }}</h1>
                    <div class="mt-5">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="mt-5 flex space-x-3 items-center">
                        <div>
                            <div class="flex text-gray-700">
                                <button wire:click="decrement" class="border border-gray-700 px-4 text-lg">-</button>
                                <input type="text" wire:model="quantity"
                                    class="w-20 text-center font-bold text-green-600 text-sm" placeholder="0">
                                <button wire:click="increment" class="border border-gray-700 px-4 text-lg">+</button>
                            </div>
                        </div>
                        <div>
                            <x-button wire:click="addToCart" spinner="addToCart" squared positive outline
                                icon="shopping-cart" label="Add to Cart" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <section class="">
            <div class="relative py-12 mx-auto  max-w-7xl">
                <div x-data="{ tab: 'tab1' }">
                    <ul class="flex gap-4 text-sm text-base-500 border-b">
                        <li class="-mb-px">
                            <a @click.prevent="tab = 'tab1'" href="#_"
                                class="inline-block py-2 font-medium bg-white text-accent-500 border-b-2 border-accent-500"
                                :class="{ ' bg-white text-accent-500 border-b-2 border-accent-500': tab === 'tab1' }">
                                Reviews (0)</a>
                        </li>

                    </ul>
                    <div class="py-4 pt-4 text-left bg-white content">
                        <div x-show="tab==='tab1'" class="text-base-500">
                            <main class="py-4">
                                <p class="text-base-500 text-sm">Your email address will not be published. Required
                                    fields are marked *</p>
                                <div class="flex mt-5 space-x-4 items-center">
                                    <h1>Your Rating: </h1>
                                    <div x-data="{
                                        disabled: false,
                                        max_stars: 5,
                                        stars: 0,
                                        value: 0,
                                        hoverStar(star) {
                                            if (this.disabled) {
                                                return;
                                            }
                                    
                                            this.stars = star;
                                        },
                                        mouseLeftStar() {
                                            if (this.disabled) {
                                                return;
                                            }
                                    
                                            this.stars = this.value;
                                        },
                                        rate(star) {
                                            if (this.disabled) {
                                                return;
                                            }
                                    
                                            this.stars = star;
                                            this.value = star;
                                    
                                            $refs.rated.classList.remove('opacity-0');
                                            setTimeout(function() {
                                                $refs.rated.classList.add('opacity-0');
                                            }, 2000);
                                        },
                                        reset() {
                                            if (this.disabled) {
                                                return;
                                            }
                                    
                                            this.value = 0;
                                            this.stars = 0;
                                        }
                                    }" x-init="this.stars = this.value">
                                        <div class="flex flex-col items-center max-w-6xl mx-auto jusitfy-center">
                                            {{-- <div x-ref="rated"
                                                class="absolute -mt-2 text-xs font-medium text-gray-900 duration-300 ease-out -translate-y-full opacity-0">
                                                Rated <span x-text="value"></span> Stars</div> --}}
                                            <ul class="flex">
                                                <template x-for="star in max_stars">
                                                    <li @mouseover="hoverStar(star)" @mouseleave="mouseLeftStar"
                                                        @click="rate(star)" class="px-1 cursor-pointer"
                                                        :class="{ 'text-gray-400 cursor-not-allowed': disabled }">
                                                        <svg x-show="star > stars" class="w-6 h-6 text-gray-900"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                            <rect width="256" height="256" fill="none" />
                                                            <path
                                                                d="M128,189.09l54.72,33.65a8.4,8.4,0,0,0,12.52-9.17l-14.88-62.79,48.7-42A8.46,8.46,0,0,0,224.27,94L160.36,88.8,135.74,29.2a8.36,8.36,0,0,0-15.48,0L95.64,88.8,31.73,94a8.46,8.46,0,0,0-4.79,14.83l48.7,42L60.76,213.57a8.4,8.4,0,0,0,12.52,9.17Z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="16" />
                                                        </svg>
                                                        <svg x-show="star <= stars"
                                                            class="w-6 h-6 text-green-600 fill-current"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                                            <rect width="256" height="256" fill="none" />
                                                            <path
                                                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z" />
                                                        </svg>
                                                    </li>
                                                </template>
                                            </ul>

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-5">
                                    <h1>Your Review:</h1>
                                    <x-textarea placeholder="your review" />
                                </div>
                                <div class="mt-5">
                                    <x-button label="Leave your Review" squared positive outline />
                                </div>
                            </main>
                        </div>

                    </div>
                </div>
                <div class="mt-10">
                    reviews here,,,
                </div>
            </div>
        </section>

    </div>
</div>

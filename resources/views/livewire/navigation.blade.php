<div class="justify-center w-full mx-auto bg-green-600">
    <!-- Banner Section -->

    <!-- Navigation Section with Alpine.js State Management -->
    <div x-data="{ open: false }"
        class="flex flex-col w-full mx-auto px-8 md:items-center md:justify-between md:flex-row 2xl:px-0 py-5  max-w-screen-xl relative">
        <div class="flex flex-row items-center justify-between text-black">
            <!-- Logo Section -->
            <a href="{{ route('welcome') }}"
                class="flex items-center font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto 2xl:text-3xl text-2xl font-bold leading-none text-white select-none">D&M <span
                        class="uppercase text-yellow-300">General
                        Merchandise</span></span>
            </a>
            <!-- Search Bar -->
            <div class="hidden md:flex md:items-center md:flex-1 max-w-xl mx-4">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        class="w-full px-4 py-2 pl-10 pr-4 rounded-lg border border-gray-300 bg-white focus:outline-none focus:border-green-500 text-gray-800" 
                        placeholder="Search products..."
                        wire:model.live="search"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            <button
                class="flex items-center justify-center transition-all duration-200 focus:ring-2 transition-shadow focus:outline-none text-base-500 bg-white hover:text-accent-500 ring-1 ring-base-200 focus:ring-accent-500 size-9 p-2 text-sm rounded-md md:hidden"
                @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid size-3"
                    x-data="{ open: false }">
                    <!-- Paths for burger icon -->
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <!-- Paths for close icon (toggle icon) -->
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <!-- Navigation Menu -->
        @if (auth()->check())
            <div class="flex space-x-4 items-center">
                <button class="text-white  hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                        height="30" viewBox="0 0 24 24" fill="white" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                    </svg></button>
                <a href="{{ route('client.cart') }}" class="text-white  hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        fill="white" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-shopping-cart">
                        <circle cx="8" cy="21" r="1" />
                        <circle cx="19" cy="21" r="1" />
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                    </svg>
                </a>
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen=true" class="">
                        @if (auth()->user()->clientInfo == null)
                            <img src="" class="object-cover w-10 h-10 border rounded-full border-neutral-200" />
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->clientInfo->avatar) }}"
                                class="object-cover w-10 h-10 border rounded-full border-neutral-200" />
                        @endif
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                        x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                        x-transition:enter-end="translate-y-0"
                        class="absolute top-0 z-50 w-48 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                        <div
                            class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                            <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <a href="{{ route('client-profile') }}"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-neutral-100 focus:text-neutral-900 data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-4 h-4 mr-2 lucide lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span>Profile</span>
                            </a>
                            <a href="{{ route('client.orders') }}"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-neutral-100 focus:text-neutral-900 data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="w-4 h-4 mr-2 lucide lucide-shopping-cart">
                                    <circle cx="8" cy="21" r="1" />
                                    <circle cx="19" cy="21" r="1" />
                                    <path
                                        d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                </svg>
                                <span>Orders</span>
                            </a>
                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="relative flex w-full cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-neutral-100 focus:text-neutral-900 data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="w-4 h-4 mr-2 lucide lucide-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" x2="9" y1="12" y2="12" />
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col items-center flex-grow hidden gap-3 p-4 px-5 md:px-0 md:pb-0 md:flex md:justify-start md:flex-row lg:p-0">
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center transition-all duration-200 focus:ring-2 focus:outline-none text-white border hover:bg-white hover:text-gray-600 focus:ring-accent-500/50 h-9 px-4 py-2 text-sm font-medium rounded-md md:ml-auto">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center transition-all duration-200 focus:ring-2 focus:outline-none text-gray-600 bg-white hover:bg-gray-100 focus:ring-accent-500/50 h-9 px-4 py-2 text-sm font-medium rounded-md">
                    Register
                </a>
            </nav>
        @endif
    </div>
</div>

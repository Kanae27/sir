<div>
    <div class="flex space-x-2">
        @if (auth()->user()->clientInfo == null)
            <img src="{{ asset('images/banner1.png') }}" class="h-12 w-12 object-cover rounded-full" alt="">
        @else
            <img src="{{ Storage::url(auth()->user()->clientInfo->picture) }}" class="h-12 w-12 object-cover rounded-full"
                alt="">
        @endif
        <div>
            <h1 class="uppercase">{{ auth()->user()->name }}</h1>
            <button>
                <h1 class="text-sm text-gray-500 cursor-pointer">Edit Profile</h1>
            </button>
        </div>
    </div>
    <div class="mt-5 border-t pt-5">
        <ul class="space-y-4">
            <li>
                <button x-on:click="open = !open" class="flex space-x-2 items-center hover:text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-user-round">
                        <circle cx="12" cy="8" r="5" />
                        <path d="M20 21a8 8 0 0 0-16 0" />
                    </svg>
                    <span>My Account</span>
                </button>
                <div x-show="open" class="px-6 mt-2">
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('client-profile') }}"
                                class=" hover:text-green-600 hover:font-semibold {{ request()->routeIs('client-profile') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Profile</a>
                        </li>

                        <li>
                            <a href="{{ route('change-password') }}"
                                class="hover:text-green-600 hover:font-semibold {{ request()->routeIs('change-password') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Change
                                Password</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('my-purchases') }}"
                    class="flex space-x-2 items-center hover:text-green-600 {{ request()->routeIs('my-purchases') ? ' text-green-600 font-semibold' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-clipboard-list">
                        <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                        <path d="M12 11h4" />
                        <path d="M12 16h4" />
                        <path d="M8 11h.01" />
                        <path d="M8 16h.01" />
                    </svg>
                    <span>My Purchases</span>
                </a>
            </li>
        </ul>
    </div>
</div>

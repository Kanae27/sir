<div>
    <div class="grid grid-cols-5 gap-2">
        <div class="border bg-white rounded-lg p-5">
            <div class="flex justify-between items-center">
                <span class="text-2xl">{{ \App\Models\Product::count() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-package text-green-600">
                    <path
                        d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z" />
                    <path d="M12 22V12" />
                    <path d="m3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7" />
                    <path d="m7.5 4.27 9 5.15" />
                </svg>
            </div>
            <div class="mt-2">
                <p>Total Products</p>
            </div>
        </div>
        <div class="border bg-white rounded-lg p-5">
            <div class="flex justify-between items-center">
                <span class="text-2xl">{{ \App\Models\Product::where('quantity', '<', 10)->count() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-alert-triangle text-orange-500">
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                    <path d="M12 9v4"></path>
                    <path d="M12 17h.01"></path>
                </svg>
            </div>
            <div class="mt-2">
                <p>Low Stock Products</p>
            </div>
        </div>
        <div class="border bg-white rounded-lg p-5">
            <div class="flex justify-between items-center">
                <span class="text-2xl">{{ \App\Models\User::where('user_type', 'client')->count() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-users-round text-blue-600">
                    <path d="M18 21a8 8 0 0 0-16 0" />
                    <circle cx="10" cy="8" r="5" />
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                </svg>
            </div>
            <div class="mt-2">
                <p>Registered Users</p>
            </div>
        </div>
        <div class="border bg-white rounded-lg p-5">
            <div class="flex justify-between items-center">
                <span class="text-2xl">{{ \App\Models\Order::where('status', 'pending')->count() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-clock text-yellow-400">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                </svg>
            </div>
            <div class="mt-2">
                <p>Pending Orders</p>
            </div>
        </div>
        <div class="border bg-white rounded-lg p-5">
            <div class="flex justify-between items-center">
                <span class="text-2xl">&#8369;{{ \App\Models\Order::where('status', 'completed')->sum('total_amount') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-landmark text-red-500">
                    <line x1="3" x2="21" y1="22" y2="22" />
                    <line x1="6" x2="6" y1="18" y2="11" />
                    <line x1="10" x2="10" y1="18" y2="11" />
                    <line x1="14" x2="14" y1="18" y2="11" />
                    <line x1="18" x2="18" y1="18" y2="11" />
                    <polygon points="12 2 20 7 4 7" />
                </svg>
            </div>
            <div class="mt-2">
                <p>Total Sales</p>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <livewire:admin.order-list />
    </div>
</div>

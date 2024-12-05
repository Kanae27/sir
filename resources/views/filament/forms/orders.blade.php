<ul class="space-y-3">
    <li class="bg-gray-100 rounded-lg shadow-sm px-8 py-6">
        <div class="border-b pb-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h1 class="text-lg font-semibold text-gray-800">Customer Information</h1>
                    <div class="mt-2 space-y-1">
                        <p class="text-gray-600">Name: <span class="text-gray-800">{{ $getRecord()->user->name }}</span></p>
                        <p class="text-gray-600">Payment: <span class="text-gray-800">{{ $getRecord()->payment_method }}</span></p>
                        @if ($getRecord()->payment_method != 'cod')
                            <p class="text-gray-600">
                                Proof: <a href="{{ Storage::url($getRecord()->proof_of_payment) }}" target="_blank"
                                    class="text-green-600 hover:text-green-700 font-medium">[view proof]</a>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-gray-600">Status</p>
                    @switch($getRecord()->status)
                        @case('pending')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                {{ strtoupper($getRecord()->status) }}
                            </span>
                        @break
                        @case('to_pay')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                {{ strtoupper($getRecord()->status) }}
                            </span>
                        @break
                        @default
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                {{ strtoupper($getRecord()->status) }}
                            </span>
                    @endswitch
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Order Items</h2>
            <ul class="space-y-4">
                @foreach ($getRecord()->carts as $cart)
                    <li class="bg-white rounded-lg shadow-sm px-6 py-4">
                        <div class="flex items-center space-x-6">
                            <div class="flex-shrink-0">
                                <img src="{{ Storage::url($cart->product->productImages->first()->file_path) }}"
                                    class="w-16 h-20 object-cover rounded-md" alt="{{ $cart->product->name }}">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-medium text-gray-900 truncate">
                                    {{ $cart->product->name }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $cart->product->description }}</p>
                                <p class="mt-1 text-sm font-medium text-gray-700">Quantity: {{ $cart->quantity }}</p>
                            </div>
                            <div class="flex-shrink-0 text-right">
                                <p class="text-base font-medium text-red-600">&#8369;{{ number_format($cart->product->price, 2) }}</p>
                                <p class="mt-1 text-sm text-gray-500">Subtotal: &#8369;{{ number_format($cart->product->price * $cart->quantity, 2) }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            
            <div class="mt-6 flex justify-end items-baseline space-x-4 px-6">
                <span class="text-gray-600">Order Total:</span>
                <span class="text-xl font-semibold text-gray-900">&#8369;{{ number_format($getRecord()->total_amount, 2) }}</span>
            </div>
        </div>
    </li>
</ul>

<div x-data>
    <div class="bg-white p-10">
        <div class="flex justify-between items-end  ">
            <div class="flex space-x-4 items-center">
                <div class="w-56">
                    <x-datetime-picker wire:model.live="date_from" without-time without-timezone label="Date From" />
                </div>
                <div class="w-56">
                    <x-datetime-picker wire:model.live="date_to" without-time without-timezone label="Date To" />
                </div>
            </div>
            <x-button label="Print" squared icon="printer" slate class="font-semibold uppercase"
                @click="printOut($refs.printContainer.outerHTML);" />
        </div>
        <div class="mt-10 ">
            <div x-ref="printContainer">
                <table id="example" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                DATE
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                PRODUCTS
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                TOTAL
                            </th>
                            <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                TYPE OF TRANSACTION
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($orders as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->created_at->format('m/d/Y') }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    <ul>
                                        @foreach ($item->carts as $cart)
                                            <li>{{ $cart->product->name }} x {{ $cart->quantity }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    &#8369;{{ number_format($item->total_amount, 2) }}
                                </td>

                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->transaction_type }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="border-2  text-gray-700  px-3 py-1">

                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">

                            </td>
                            <td class="border-2  text-gray-700   px-3 py-1">
                                <span class="font-bold">
                                    &#8369;{{ number_format($orders->sum('total_amount'), 2) }}</span>
                            </td>

                            <td class="border-2  text-gray-700  px-3 py-1">

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

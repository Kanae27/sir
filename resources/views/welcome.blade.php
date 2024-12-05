<x-client-layout>
    <div>
        <div class="relative overflow-hidden 2xl:py-12 py-5 bg-white">
            <div class="mx-auto max-w-7xl 2xl:px-0 px-2">
                <div class="border w-full 2xl:h-96 h-72 rounded-xl bg-gray-200 overflow-hidden">
                    <img src="{{ asset('images/banner1.png') }}" class="object-cover w-full h-full" alt="">
                </div>
            </div>
        </div>
        <div>
            <div class="bg-gray-100">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-700">Featured Products</h2>

                    <livewire:client.featured-product />
                </div>
            </div>

        </div>
        <div class="bg-white">
            <livewire:client.all-product />
        </div>
    </div>
</x-client-layout>

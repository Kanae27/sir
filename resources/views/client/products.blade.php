@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8">Our Products</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if(isset($product->image))
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image available</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-semibold">₱{{ number_format($product->price, 2) }}</span>
                            @if(isset($product->stock) && $product->stock > 0)
                                <span class="text-sm text-gray-500">In Stock: {{ $product->stock }}</span>
                            @else
                                <span class="text-sm text-red-500">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12">
                    <p class="text-gray-500">No products available at the moment.</p>
                </div>
            @endforelse
        </div>

        @if(method_exists($products, 'links'))
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

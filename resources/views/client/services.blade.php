@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8">Our Services</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">{{ $service->name }}</h3>
                    <p class="text-gray-600">{{ $service->description }}</p>
                    <p class="mt-4 text-green-600 font-semibold">₱{{ number_format($service->price, 2) }}</p>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500">No services available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

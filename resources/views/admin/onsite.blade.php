<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ON-SITE') }}
        </h2>
    </x-slot>
    <div>
        <livewire:admin.onsite-sale />
    </div>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accounts') }}
        </h2>
    </x-slot>
    <div>
        <livewire:admin.user-list />
    </div>
</x-admin-layout>

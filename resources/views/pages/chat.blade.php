<x-client-layout>
    <div class="mx-auto max-w-7xl py-12">
        <div class="flex items-center space-x-2 text-green-600">
            <h1 class="font-bold text-2xl">Chat</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-messages-square">
                <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2z" />
                <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
            </svg>
        </div>
        <div class="mt-5">
            <livewire:admin.chat />
        </div>
    </div>

</x-client-layout>

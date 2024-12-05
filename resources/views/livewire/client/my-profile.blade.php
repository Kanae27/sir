<div>
    <div class="bg-gray-100 p-5">
        <div class="border-b">
            <h1 class="text-xl font-bold">My Profile</h1>
            <p class="text-sm text-gray-500">Manage and protect your account</p>
        </div>
        <div class="mt-5 w-1/2">
            <div>
                {{ $this->form }}
            </div>
            <div class="mt-5">
                <x-button label="Save" wire:click="save" spinner="save" slate squared class="font-semibold" />
            </div>
        </div>
    </div>
</div>

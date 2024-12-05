<div>
    <div class="bg-gray-100 p-5">
        <h1 class="text-2xl font-semibold text-green-600">Change Password</h1>
        <div class="mt-10 w-1/2">
            <x-input label="New Password" wire:model="password" />
        </div>
        <div class="mt-5">
            <x-button label="Save" squared wire:click="save" spinner="save" slate class="font-semibold" />
        </div>
    </div>
</div>

<div>
    <div class="bg-white p-10">
        <div>
            {{ $this->form }}
        </div>

        <div class="mt-10 border-t pt-5">
            <x-button label="Submit" slate right-icon="arrow-right" class="font-medium" wire:click="submitRecord"
                spinner="submitRecord" />
        </div>
    </div>
</div>

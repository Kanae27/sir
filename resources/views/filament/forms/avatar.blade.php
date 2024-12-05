<div>
    <h1>Profile</h1>
    <div class="h-32 w-32 mt-2 rounded-full overflow-hidden border-2 shadow relative group">
        @if ($this->images)
            <img src="{{ $this->images->temporaryUrl() }}" class="h-full w-full object-cover" alt="User Avatar">
        @else
            <img src="{{ $this->image ? Storage::url($this->image) : asset('default-avatar.png') }}"
                class="h-full w-full object-cover" alt="User Avatar">
        @endif
        <input type="file" class="hidden" wire:model="images" id="image-upload">
        <label for="image-upload"
            class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-white font-semibold cursor-pointer opacity-0 group-hover:opacity-100">
            Change
        </label>
    </div>
</div>

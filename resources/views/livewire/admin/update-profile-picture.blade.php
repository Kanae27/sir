<div>
    <div class="mt-4">
        <div class="flex items-center">
            <div class="mr-4">
                @if ($profile && $profile->profile_picture)
                    <img src="{{ Storage::url($profile->profile_picture) }}" 
                         alt="Profile Picture" 
                         class="w-20 h-20 rounded-full object-cover">
                @else
                    <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif
            </div>
            
            <div>
                <input type="file" wire:model="photo" class="hidden" id="photo" accept="image/*">
                <x-secondary-button onclick="document.getElementById('photo').click()">
                    {{ __('Change Photo') }}
                </x-secondary-button>
                
                @error('photo')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        @if ($photo)
            <div class="mt-4">
                <div class="mb-2">
                    Photo Preview:
                    <img src="{{ $photo->temporaryUrl() }}" class="w-20 h-20 rounded-full object-cover">
                </div>
                
                <x-primary-button wire:click="save" wire:loading.attr="disabled">
                    {{ __('Save Photo') }}
                </x-primary-button>
                
                @if (session()->has('message'))
                    <span class="text-green-500 text-sm ml-2">{{ session('message') }}</span>
                @endif
            </div>
        @endif
    </div>
</div>

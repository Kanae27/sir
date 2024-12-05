<div>
    <div class="grid grid-cols-6 gap-5 bg-white py-5 px-5">
        <div class="col-span-2">
            <ul class="space-y-2">
                @if (auth()->user()->user_type == 'admin')
                    @forelse ($users as $item)
                        <li class=" px-5 hover:bg-gray-100 rounded-xl py-2  ">
                            <a href="" class="flex space-x-2 items-center">
                                <img src="{{ asset('images/banner1.jpg') }}" class="h-14 w-14 object-cover rounded-full"
                                    alt="">
                                <div>
                                    <h1 class="font-semibold">{{ $item->user->name }}</h1>
                                </div>
                            </a>
                        </li>
                    @empty
                    @endforelse
                @else
                    <li class=" px-5 hover:bg-gray-100 rounded-xl py-2  ">
                        <a href="" class="flex space-x-2 items-center">
                            <img src="{{ asset('images/banner1.jpg') }}" class="h-14 w-14 object-cover rounded-full"
                                alt="">
                            <div>
                                <h1 class="font-semibold">Administrator</h1>
                            </div>
                        </a>
                    </li>
                @endif

            </ul>

        </div>
        <div class="col-span-4 ">
            <h1 class="text-2xl">Chat with {{ $name }}</h1>
            <div class="mt-2 border  rounded-2xl">
                <!-- Chat Container -->
                <div class="flex flex-col w-full h-[40rem] gap-4 p-5 overflow-y-auto">
                    <!-- Messages (Example Messages) -->
                    @forelse ($chats as $item)
                        @if ($item->sender_id == auth()->user()->id)
                            <div class="flex items-end gap-2">
                                <div
                                    class="ml-auto flex max-w-[70%] flex-col gap-2 rounded-l-xl rounded-tr-xl bg-green-600 p-4 text-sm text-slate-100  dark:text-slate-100">
                                    {{ $item->message }}
                                    <span class="ml-auto text-xs">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                                <span
                                    class="flex size-8 items-center justify-center overflow-hidden rounded-full border border-slate-300 bg-slate-100 text-sm font-bold tracking-wider text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">JS</span>
                            </div>
                        @else
                            <div class="flex items-end gap-2">
                                <img class="size-8 rounded-full object-cover"
                                    src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp"
                                    alt="avatar" />
                                <div
                                    class="mr-auto flex max-w-[70%] flex-col gap-2 rounded-r-2xl rounded-tl-2xl bg-slate-100 p-4 text-slate-700 md:max-w-[60%] dark:bg-slate-800 dark:text-slate-300">
                                    <span class="font-semibold text-black dark:text-white">{{ $this->name }}</span>
                                    <div class="text-sm">
                                        {{ $item->message }}
                                    </div>
                                    <span class="ml-auto text-xs">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endif

                    @empty
                        <div class="grid h-full place-content-center">
                            No Message Available!
                        </div>
                    @endforelse
                    <!-- Add more messages as needed -->
                </div>

                <!-- Input Area -->
                <div class="bg-gray-100 rounded-xl p-4 mt-5 flex space-x-3">
                    <div class="flex-1">
                        <input type="text" wire:model="message"
                            class="w-full bg-transparent border-0 focus:border-0 focus:ring-0"
                            placeholder="Message for {{ $name }}" />
                    </div>
                    <x-button label="Send" class="font-semibold" positive right-icon="paper-airplane"
                        wire:click="send" />
                </div>
            </div>


        </div>
    </div>
</div>

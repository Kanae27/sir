<div class="ml-3 w-20 rounded-lg overflow-hidden">
    <swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true">
        @foreach ($getRecord()->productImages as $item)
            <swiper-slide>
                <div class="bg-blue-800 w-full">
                    <img src="{{ Storage::url($item->file_path) }}" class="w-20 object-cover h-12" alt="">
                </div>
            </swiper-slide>
        @endforeach
    </swiper-container>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


</div>

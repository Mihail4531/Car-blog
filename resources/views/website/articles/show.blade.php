<x-app :title="$title">
    <div class="max-w-[1400px] ml-auto mr-auto mt-30">
    <div class="  bg-purple-700 border border-purple-700 rounded-lg shadow-sm">
        <div class="flex">
            <div class="swiper mySwiper h-[400px] w-full">
                <div class="swiper-wrapper">

                    @foreach ($article->image as $img)
                        <div class="swiper-slide">
                            <img class="w-full h-full object-cover" src="{{ $img ? url('storage',  $img) : asset('asset/image/none.png') }}" loading="lazy" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->name }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-white ">{{ $article->small_text }}</p>
            <p class="mb-3 font-normal text-white ">{{ $article->content }}</p>
        </div>
        <div class="flex flex-col">
            @if ($article->documents)
            @foreach ($article->documents as $document)
                    <a href="{{ $document }}" download class="text-black  border-white border bg-white rounded-lg w-[20%] m-5 px-5">
                        Скачать материал по статье
                    </a>
                @endforeach
            @endif

        </div>
    </div>
</div>
</x-app>

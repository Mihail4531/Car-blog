<x-app :title="$title">

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
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
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->small_text }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->content }}</p>
        </div>
        <div class="flex flex-col">
            @foreach ($article->documents as $document)
                <a href="{{ $document }}" download class="text-gray-700 dark:text-gray-400">
                    Скачать материал по статье
                </a>
            @endforeach
        </div>
    </div>

</x-app>

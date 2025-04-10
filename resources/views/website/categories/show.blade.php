<x-app :title="$title">
    <div class="max-w-[1400px] ml-auto mr-auto">
    <div class="grid grid-cols-3 gap-3">
        @foreach ($articles as $article)
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('articles.show', $article->id) }}">
            <div class="swiper mySwiper h-[400px] w-full">
                <div class="swiper-wrapper">
                @if ($article->image)
                        @foreach ($article->image as $img)
                        <div class="swiper-slide">
                            <img class="w-full h-full object-cover rounded-t-lg"
                                src="{{ $img ? url('storage',  $img) : asset('asset/image/none.png') }}" loading="lazy" />
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                @else
                <img src="{{asset('asset/image/none.png')}}" alt="">
                @endif
            </div>
        </a>
        <div class="p-5">
            <a href="{{route('articles.show', $article->id) }}">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->name }}</h1>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($article->small_text, 17, '...') }}</p>
            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{route('articles.show', $article->id) }}">Подробнее</a>
        </div>
    </div>

    @endforeach
    </div>
</div>
</x-app>

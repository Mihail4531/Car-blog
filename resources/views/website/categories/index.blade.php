<x-app :title="$title">
    <div class="grid grid-cols-3 gap-3">
        @foreach ( $categories as $category)
        <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96 p-6">
            <div class="flex items-center mb-4">
                <h5 class="ml-3 text-slate-800 text-xl font-semibold">
                    {{$category->name}}
                </h5>
            </div>
            <div>
                <a href="{{route('categories.show-articles', $category->id)}}" class="text-slate-800 font-semibold text-sm hover:underline flex items-center">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</x-app>

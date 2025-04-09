<div>
 @if ($articles->isNotEmpty())
 @foreach ($articles as $article)
     <div>
        <h1>{{$article->name }}</h1>
        <p>{{ Str::limit($article->small_text, '80') }}...</p>
        <img src="{{$article->image ? url('storage', $article->image) : asset('asset/image/none.png') }}" />
        <a href="{{route('articles.show', ['id' => $article->id]) }}">Подробнее</a>
     </div>
 @endforeach
     @else
     {{ __('Записей нет.') }}
 @endif
</div>

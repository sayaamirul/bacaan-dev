<div class="card">
    <div class="card-body w-full flex-col md:flex-row md:items-center">
        <div class="w-full md:w-1/4">
            <a href="{{ route('article.single', $article) }}" wire:navigate>
                <img alt="{{ $article->title }}"
                     class="cursor-pointer rounded-lg transition duration-500 hover:scale-110 md:w-96"
                     src="{{ Storage::url($article->thumbnail) }}">
            </a>
        </div>
        <div class="w-full space-y-4 md:ml-5 md:w-3/4">
            <h2 class="card-title">
                <a class="cursor-pointer rounded-lg font-semibold text-primary transition duration-500 hover:scale-110 hover:text-secondary md:text-2xl"
                   href="{{ route('article.single', $article) }}"
                   wire:navigate>{{ $article->series ? $article->series->title . ' - ' : '' }} {{ $article->title }}</a>
            </h2>
            @foreach ($article->topics as $topic)
                <a class="text-sm font-bold text-accent hover:text-secondary" href="{{ route('topic.single', $topic) }}"
                   wire:navigate>
                    #{{ $topic->name }}
                </a>
            @endforeach
            <x-markdown>
                {!! \Illuminate\Support\Str::limit($article->content, 200) !!}
            </x-markdown>
        </div>
    </div>
</div>

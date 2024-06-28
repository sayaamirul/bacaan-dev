<div
    class="flex h-full cursor-pointer flex-col space-y-2 rounded-2xl bg-base-100 p-3 shadow-lg transition duration-1000 hover:scale-95 hover:rounded-2xl">
    <figure>
        <a href="{{ route('article.single', $article) }}" wire:navigate>
            <img alt="{{ $article->title }}" class="rounded-2xl" src="{{ Storage::url($article->thumbnail) }}" />
        </a>
    </figure>
    <div class="flex justify-between">
        <p>{{ $article->user->name }}</p>
        <div class="flex space-x-1">
            @foreach ($article->topics as $topic)
                <a class="link link-primary text-sm font-bold italic no-underline"
                    href="{{ route('topic.single', $topic) }}" wire:navigate>
                    #{{ $topic->name }}
                </a>
            @endforeach
        </div>
    </div>
    {{-- <div class="flex space-x-1 text-left">
        @foreach ($article->topics as $topic)
            <a class="link link-primary text-sm font-bold no-underline" href="{{ route('topic.single', $topic) }}"
                wire:navigate>
                {{ $topic->name }}
            </a>
        @endforeach
    </div> --}}
    <a class="link link-accent text-lg font-bold no-underline" href="{{ route('article.single', $article) }}"
        wire:navigate>{{ $article->title }}
    </a>
</div>

<div
    class="flex h-full cursor-pointer flex-col space-y-4 rounded-2xl bg-base-100 p-4 shadow-lg transition duration-1000 hover:scale-95 hover:rounded-2xl">
    <figure>
        <a href="{{ route('article.single', $article) }}" wire:navigate>
            <img alt="{{ $article->title }}" class="rounded-2xl shadow-lg" src="{{ Storage::url($article->thumbnail) }}" />
        </a>
    </figure>
    <div class="flex h-full flex-col justify-between space-y-2">
        <a class="link link-primary text-lg font-bold no-underline" href="{{ route('article.single', $article) }}"
            wire:navigate>{{ $article->title }}
        </a>
        <div class="flex justify-end">
            <div class="flex space-x-1">
                @foreach ($article->topics as $topic)
                    <a class="link link-accent text-sm font-bold italic no-underline"
                        href="{{ route('topic.single', $topic) }}" wire:navigate>
                        #{{ $topic->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

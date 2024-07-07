<x-slot name="title">Artikel {{ $topic->name }}</x-slot>
<x-slot name="description">
    Article {{ $topic->name }}, Tutorial {{ $topic->name }}, Learn {{ $topic->name }}, {{ $topic->name }} Course
</x-slot>
<x-slot name="thumbnail">{{ Storage::url($topic->icon) }}</x-slot>

<div class="py-6">
    <div class="flex flex-col justify-center text-center">
        <div class="flex justify-center">
            <img alt="{{ $topic->name }}" class="h-48 w-48 cursor-pointer transition duration-500 hover:scale-125"
                src="{{ Storage::url($topic->icon) }}">
        </div>
        <div class="prose-lg mx-auto my-6 max-w-2xl justify-center space-y-2">
            <h2 class="font-bold">Articles about {{ $topic->name }}</h2>
            <p>{{ $topic->description }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
        @foreach ($articles as $article)
            <livewire:components.article-card :article="$article" />
        @endforeach
    </div>

    @if ($topic->articles_count == 0)
        <div class="flex items-center justify-center space-x-4">
            <svg class="icon icon-tabler icon-tabler-mood-empty h-8 w-8 text-error" fill="none" height="24"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 10l.01 0"></path>
                <path d="M15 10l.01 0"></path>
                <path d="M9 15l6 0"></path>
            </svg>
            <h2 class="text-xl font-bold text-error">Currently no articles about {{ $topic->name }} !</h2>
            <svg class="icon icon-tabler icon-tabler-mood-empty h-8 w-8 text-error" fill="none" height="24"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M9 10l.01 0"></path>
                <path d="M15 10l.01 0"></path>
                <path d="M9 15l6 0"></path>
            </svg>
        </div>
    @endif
</div>

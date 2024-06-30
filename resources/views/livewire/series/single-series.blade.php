<x-slot name="title">Seri Tutorial {{ $series->title }}</x-slot>
<x-slot name="description">
    Artikel {{ $series->title }}, Tutorial {{ $series->title }}, Belajar {{ $series->title }}
</x-slot>
<x-slot name="thumbnail">{{ Storage::url($series->thumbnail) }}</x-slot>

<div>
    {{--    Topic Head --}}
    <div class="prose mx-auto max-w-2xl space-y-2 md:prose-lg">
        <div class="flex justify-center">
            <img alt="{{ $series->title }}" class="rounded-2xl shadow-lg" src="{{ Storage::url($series->thumbnail) }}">
        </div>
        <h2 class="text-center text-3xl font-bold">Seri Tutorial {{ $series->title }}</h2>
        <p class="text-center">{{ $series->description }}</p>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        @forelse($series->articles as $article)
            <livewire:components.article-card :article="$article" />
        @empty
            <div class="flex justify-center text-center">
                <p class="text-center">Belum ada artikel dengan topik {{ $topic->title }}</p>
            </div>
        @endforelse
    </div>

</div>

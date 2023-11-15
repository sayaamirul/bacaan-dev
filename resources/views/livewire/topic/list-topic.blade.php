<x-slot name="title">Topik</x-slot>

<div class="grid grid-cols-1 md:grid-cols-3">
    @foreach ($topics as $topic)
        <div class="card">
            <div class="card-body justify-center text-center">
                <a class="flex justify-center" href="{{ route('topic.single', $topic) }}" wire:navigate>
                    <img alt="Tutorial {{ $topic->name }}, Kursus {{ $topic->name }}"
                        class="mb-4 h-24 cursor-pointer transition duration-500 hover:scale-125 md:h-28"
                        src="{{ Storage::url($topic->icon) }}">
                </a>
                <a href="{{ route('topic.single', $topic) }}" wire:navigate>
                    <h1
                        class="cursor-pointer text-2xl font-bold text-primary transition duration-500 hover:scale-110 hover:text-secondary md:text-3xl">
                        {{ $topic->name }}
                    </h1>
                </a>
                <h2 class="font-semibold"> ({{ $topic->articles_count }} Artikel)</h2>
                <p class="">{{ $topic->description }}</p>
            </div>
        </div>
    @endforeach
</div>

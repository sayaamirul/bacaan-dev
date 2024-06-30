<x-slot name="title">Topics</x-slot>

<div class="grid grid-cols-1 gap-4 md:grid-cols-4">
    @foreach ($topics as $topic)
        <div class="card rounded-2xl bg-base-100 shadow-lg">
            <div class="card-body justify-center text-center">
                <a class="flex justify-center" href="{{ route('topic.single', $topic) }}" wire:navigate>
                    <img alt="Tutorial {{ $topic->name }}, Kursus {{ $topic->name }}"
                        class="mb-4 h-24 cursor-pointer transition duration-500 hover:scale-110 md:h-28"
                        src="{{ Storage::url($topic->icon) }}">
                </a>
                <a href="{{ route('topic.single', $topic) }}" wire:navigate>
                    <h1
                        class="cursor-pointer text-2xl font-bold text-primary transition duration-500 hover:scale-110 hover:text-secondary md:text-3xl">
                        {{ $topic->name }}
                    </h1>
                </a>
                <h2 class="font-semibold"> ({{ $topic->articles_count }} Artikel)</h2>
                <p class="text-sm">{{ $topic->description }}</p>
            </div>
        </div>
    @endforeach
</div>

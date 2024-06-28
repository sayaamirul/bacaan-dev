<x-slot name="title">Seri Tutorial</x-slot>

<div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach ($series as $s)
            <div class="card">
                <figure class="px-10 pt-10">
                    <a href="{{ route('series.single', $s) }}" wire:navigate>
                        <img alt="{{ $s->title }}"
                            class="cursor-pointer rounded-2xl shadow-lg transition duration-500 hover:scale-110"
                            src="{{ Storage::url($s->thumbnail) }}" />
                    </a>
                </figure>
                <div class="card-body items-center text-center">
                    <a class="cursor-pointer text-primary transition duration-500 hover:scale-110 hover:text-secondary"
                        href="{{ route('series.single', $s) }}" wire:navigate>
                        <h2 class="card-title">{{ $s->title }}</h2>
                    </a>
                    <p class="">{{ $s->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

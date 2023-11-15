<x-slot name="title">Snippet</x-slot>

<div class="py-6">
    <div class="text-md px-6 py-2 md:px-0">
        {{ Breadcrumbs::render('snippet.list') }}
    </div>
    <div class="grid grid-cols-1 gap-2 px-6 md:grid-cols-4 md:px-0">
        @foreach ($snippets as $snippet)
            <a href="{{ route('snippet.single', $snippet) }}" wire:navigate>
                <div class="card cursor-pointer rounded-lg bg-base-100 transition duration-500 hover:scale-110">
                    <div class="card-body">
                        <div class="card-title hover:text-secondary">{{ $snippet->name }}</div>

                        <p>{{ $snippet->description }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

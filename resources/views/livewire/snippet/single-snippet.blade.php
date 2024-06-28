<x-slot name="title">{{ $snippet->name }}</x-slot>

<x-slot name="description">
    Snippet {{ $snippet->name }}, Sumber Kode {{ $snippet->name }}, Source Code {{ $snippet->name }}
</x-slot>

<div>
    <div class="text-md px-6 py-2 md:px-0">
        {{ Breadcrumbs::render('snippet.single', $snippet) }}
    </div>
    <div
        class="prose break-words p-6 md:prose-lg prose-a:text-primary prose-a:no-underline hover:prose-a:text-accent prose-code:rounded-md prose-code:p-1 prose-li:m-0 prose-img:rounded-md md:order-2 md:p-0">
        <h1 class="font-bold">{{ $snippet->name }}</h1>

        @foreach ($snippet->items as $item)
            <h2 class="font-semibold">{{ $item->name }}</h2>
            <p>{{ $item->description }}</p>
            {!! (new \App\Services\MarkdownRenderer())->render($item->content) !!}
        @endforeach
    </div>
</div>

<x-slot name="title">Bacaan Untuk Programmer / Developer</x-slot>

<x-slot name="rightSidebar">
    <div class="my-2 px-6 md:my-0">
        <h2 class="text-2xl font-semibold">Snippet</h2>
        <div class="mt-4 flex flex-col space-y-2">
            @foreach ($snippets as $snippet)
                <div
                    class="prose rounded-lg bg-base-100 px-4 py-3 prose-h2:m-0 prose-p:m-0 prose-a:text-primary prose-a:no-underline hover:prose-a:text-accent">
                    <h2>
                        <a class="link link-accent cursor-pointer" href="{{ route('snippet.single', $snippet) }}"
                            wire:navigate>{{ $snippet->name }}</a>
                    </h2>
                    <p>{{ $snippet->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-slot>

<div>
    <div class="grid grid-cols-3 gap-2">
        @foreach ($articles as $article)
            <div class="col-span-full md:col-span-1">
                <livewire:components.article-card :article="$article" wire:key="{{ $article->id }}" />
            </div>
        @endforeach

        <div class="flex justify-center">
            {{ $articles->links('vendor.livewire.daisyui') }}
        </div>
    </div>

</div>

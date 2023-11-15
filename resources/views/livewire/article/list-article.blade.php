<x-slot name="title">Artikel Pemrograman, Tutorial Koding</x-slot>

<div class="py-6">
    <div class="grid grid-cols-1 md:grid-cols-2">
        @foreach ($articles as $article)
            <livewire:components.article-card :article="$article" wire:key="{{ $article->id }}" />
        @endforeach
    </div>
    <div class="flex justify-center">
        {{ $articles->links('vendor.livewire.daisyui') }}
    </div>
</div>

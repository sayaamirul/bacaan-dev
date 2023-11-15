<x-slot name="title">{{ $article->title }}</x-slot>

<x-slot name="description">
    Artikel {{ $article->title }}, Tutorial {{ $article->title }}, Belajar {{ $article->title }}
</x-slot>

<x-slot name="thumbnail">{{ Storage::url($article->thumbnail) }}</x-slot>

<x-slot name="leftSidebar">
    <div class="my-4 space-y-4 pl-6 pr-10 md:my-0">
        <h2 class="text-3xl font-bold">Penulis</h2>
        <div class="flex items-center space-x-5">
            <img alt="{{ $article->user->name }}"
                 class="avatar h-20 w-20 rounded-full ring ring-offset-2 ring-offset-base-100"
                 src="{{ Storage::url($article->user->photo) }}">
            <div class="flex flex-col space-y-1">
                <p class="text-2xl font-bold">{{ $article->user->name }}</p>
                <p class="text-accent">{{ $article->user->bio }}</p>
                {{--                        Social --}}
                {{--                        <div class="flex space-x-2"> --}}
                {{--                            <svg class="icon icon-tabler icon-tabler-brand-github" fill="none" height="20" --}}
                {{--                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" --}}
                {{--                                 viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"> --}}
                {{--                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path> --}}
                {{--                                <path --}}
                {{--                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"> --}}
                {{--                                </path> --}}
                {{--                            </svg> --}}
                {{--                            <svg class="icon icon-tabler icon-tabler-brand-x" fill="none" height="20" --}}
                {{--                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" --}}
                {{--                                 viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"> --}}
                {{--                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path> --}}
                {{--                                <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path> --}}
                {{--                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path> --}}
                {{--                            </svg> --}}
                {{--                            <svg class="icon icon-tabler icon-tabler-brand-instagram" fill="none" height="20" --}}
                {{--                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" --}}
                {{--                                 viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"> --}}
                {{--                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path> --}}
                {{--                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"> --}}
                {{--                                </path> --}}
                {{--                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> --}}
                {{--                                <path d="M16.5 7.5l0 .01"></path> --}}
                {{--                            </svg> --}}
                {{--                            <svg class="icon icon-tabler icon-tabler-brand-linkedin" fill="none" height="20" --}}
                {{--                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" --}}
                {{--                                 viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"> --}}
                {{--                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path> --}}
                {{--                                <path --}}
                {{--                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"> --}}
                {{--                                </path> --}}
                {{--                                <path d="M8 11l0 5"></path> --}}
                {{--                                <path d="M8 8l0 .01"></path> --}}
                {{--                                <path d="M12 16l0 -5"></path> --}}
                {{--                                <path d="M16 16v-3a2 2 0 0 0 -4 0"></path> --}}
                {{--                            </svg> --}}
                {{--                        </div> --}}
            </div>
        </div>
    </div>

    <hr class="mx-auto my-4 h-0.5 w-48 rounded border-0 bg-gray-200 md:my-10">

    @if ($article->series)
        <div class="pl-6 pr-10">
            <h2 class="text-2xl font-semibold">Seri {{ $article->series->title }}</h2>
            <p>{{ $article->series->description }}</p>
            <div class="mt-4 space-y-2">
                @foreach ($article->series->articles()->get() as $seriesArticle)
                    <div class="flex items-center space-x-1">
                        @if (request()->segment(2) == $seriesArticle->slug)
                            <svg class="icon icon-tabler icon-tabler-circle-chevrons-right" fill="none"
                                 height="24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 stroke="currentColor" viewBox="0 0 24 24" width="24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                <path d="M9 9l3 3l-3 3"></path>
                                <path d="M13 9l3 3l-3 3"></path>
                                <path d="M3 12a9 9 0 1 0 0 -.265l0 .265z"></path>
                            </svg>
                        @else
                            <svg class="icon icon-tabler icon-tabler-chevrons-right" fill="none" height="18"
                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                 viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                <path d="M7 7l5 5l-5 5"></path>
                                <path d="M13 7l5 5l-5 5"></path>
                            </svg>
                        @endif
                        <a class="@if (request()->segment(2) == $seriesArticle->slug) font-bold @endif text-primary hover:text-secondary"
                           href="{{ route('article.single', $seriesArticle) }}" wire:navigate>
                            {{ $seriesArticle->title }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-slot>

<x-slot name="rightSidebar">
    <div class="my-4 px-6 md:my-0">
        <div class="mb-4 text-3xl font-bold">Artikel Populer</div>
        <div class="items-center space-y-4">
            @foreach ($populars as $popular)
                <div class="card flex flex-row items-center space-x-2">
                    <div class="w-2/6">
                        <a href="{{ route('article.single', $popular) }}" wire:navigate>
                            <img alt="{{ $popular->title }}"
                                 class="cursor-pointer rounded transition duration-500 hover:scale-110"
                                 src="{{ Storage::url($popular->thumbnail) }}">
                        </a>
                    </div>
                    <div class="w-4/6">
                        <a class="cursor-pointer font-semibold text-primary transition duration-500 hover:scale-110 hover:text-secondary"
                           href="{{ route('article.single', $popular) }}" wire:navigate>
                            {{ $popular->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-slot>

<div>
    <div class="text-md px-6 py-2 md:px-0">
        {{ Breadcrumbs::render($article->series ? 'article.series' : 'article.single', $article) }}
    </div>
    <article
        class="prose break-words p-6 md:prose-lg prose-a:text-primary prose-a:no-underline hover:prose-a:text-accent prose-code:rounded-md prose-code:p-1 prose-code:bg-base-100 prose-code:text-accent prose-code:font-normal prose-li:m-0 prose-img:rounded-md md:order-2 md:p-0">
        <h1>{{ $article->title }}</h1>

        <div class="mt-4 flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0">
            <div class="flex items-center space-x-1">
                <svg class="icon icon-tabler icon-tabler-calendar-time" fill="none" height="20"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                     viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path d="M15 3v4"></path>
                    <path d="M7 3v4"></path>
                    <path d="M3 11h16"></path>
                    <path d="M18 16.496v1.504l1 1"></path>
                </svg>
                <span class="text-sm">
                    {{ $article->created_at->isoFormat('dddd, D MMMM YYYY') }}</span>
            </div>
            <div class="flex items-center space-x-1">
                <svg class="icon icon-tabler icon-tabler-tags" fill="none" height="24" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                    <path
                        d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z">
                    </path>
                    <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                    <path d="M6 9h-.01"></path>
                </svg>
                <div class="flex space-x-1">
                    @foreach ($article->topics as $topic)
                        <a class="text-sm font-bold" href="{{ route('topic.single', $topic) }}" wire:navigate>
                            #{{ $topic->name }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="flex justify-center">
            <img alt="{{ $article->title }}" class="w-full justify-center rounded-lg text-center"
                 src="{{ Storage::url($article->thumbnail) }}">
        </div>
        <span class="text-2xl font-semibold">Daftar Isi</span>
        <x-markdown>
            {!! $article->content !!}
        </x-markdown>
    </article>

    @if($seriesEpisode)
        <div class="flex px-6 md:px-0 space-x-3">
            <div class="w-full md:w-1/2">
                @if($seriesEpisode['prev'])
                    <div class="bg-base-100 rounded p-4">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11 7l-5 5l5 5"></path>
                                <path d="M17 7l-5 5l5 5"></path>
                            </svg>
                            <p class="font-bold">Sebelumnya</p>
                        </div>
                        <a href="{{ route('article.single', $seriesEpisode['prev']) }}"
                           class="text-primary hover:text-accent font-bold text-sm cursor-pointer"
                           wire:navigate>{{ $seriesEpisode['prev']?->title }}</a>
                    </div>
                @endif
            </div>
            <div class="w-full md:w-1/2">
                @if($seriesEpisode['next'])
                    <div class="bg-base-100 rounded p-4">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-right"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7l5 5l-5 5"></path>
                                <path d="M13 7l5 5l-5 5"></path>
                            </svg>
                            <p class="font-bold">Selanjutnya</p>
                        </div>
                        <a href="{{ route('article.single', $seriesEpisode['next']) }}"
                           class="text-primary hover:text-accent font-bold text-sm cursor-pointer"
                           wire:navigate>{{ $seriesEpisode['next']?->title }}</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

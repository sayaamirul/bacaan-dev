@unless ($breadcrumbs->isEmpty())
    <nav class="breadcrumbs">
        <ul class="flex flex-wrap">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a class="link link-accent no-underline" href="{{ $breadcrumb->url }}" wire:navigate>
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
@endunless

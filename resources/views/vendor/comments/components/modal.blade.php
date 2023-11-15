@props([
    'compact' => false,
    'left' => false,
    'bottom' => false,
    'title' => '',
    'menu' => false,
    'modal' => false,
])
<ul {{ $attributes->except(['compact', 'left', 'bottom']) }} @class([
    'dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box',
    'comments-modal',
    'compact' => $compact,
    'is-left' => $left,
    'is-bottom' => $bottom,
    'menu' => $menu,
    'modal' => $modal,
]) x-cloak>
    @if ($title)
        <p class="comments-modal-title">
            {{ $title }}
        </p>
    @endif
    <li>
        {{ $slot }}
    </li>
</ul>

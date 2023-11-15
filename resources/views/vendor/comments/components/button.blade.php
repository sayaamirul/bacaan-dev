@props([
    'submit' => false,
    'small' => false,
    'danger' => false,
    'primary' => false,
    'link' => false,
])
<button {{ $attributes->except('type', 'size', 'submit', 'link') }} @class([
    'btn',
    'btn-sm' => $small,
    'btn-error' => $danger,
    'btn-primary' => $primary,
    'is-link' => $link,
])
    type="{{ $submit ? 'submit' : 'button' }}">
    {{ $slot }}
</button>

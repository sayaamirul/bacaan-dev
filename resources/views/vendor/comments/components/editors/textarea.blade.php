@props([
    'comment' => null,
    'placeholder' => '',
    'model',
    'autofocus' => false,
])
<textarea @if ($autofocus) autofocus @endif class="comments-textarea" placeholder="{{ $placeholder }}"
    wire:model="{{ $model }}"></textarea>

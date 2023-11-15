@props(['date'])

<time class="comments-date" datetime="{{ $date->format('Y-m-d H:i:s') }}">
    {{ $date->diffInMinutes() < 1 ? __('comments::comments.just_now') : $date->diffForHumans() }}
</time>

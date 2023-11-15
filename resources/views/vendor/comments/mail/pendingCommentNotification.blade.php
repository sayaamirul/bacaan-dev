@component('mail::message')

{{ __('comments::notifications.pending_comment_mail_body', [
    'commentable_name' => $topLevelComment->commentable->commentableName(),
    'commentator_name' => $comment->commentatorProperties()->name ?? 'anonymous',
]) }}

[{{ __('comments::notifications.view_comment') }}]({{ $comment->commentUrl() }})

{!! $comment->text !!}

@component('mail::button', ['url' => $comment->approveUrl()])
    {{ __('comments::notifications.approve_comment') }}
@endcomponent

@component('mail::button', ['url' => $comment->rejectUrl()])
    {{ __('comments::notifications.reject_comment') }}
@endcomponent

@endcomponent

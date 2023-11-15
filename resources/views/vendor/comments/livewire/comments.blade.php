@php
    use Spatie\Comments\Enums\NotificationSubscriptionType;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Gate;
@endphp

<section
    class="comments {{ $newestFirst ? 'comments-newest-first' : '' }} prose-lg prose-p:m-2 prose-a:text-primary prose-a:no-underline prose-ul:m-0">
    <header class="comments-header">
        @if ($writable && $showNotificationOptions && Auth::check())
            <div class="dropdown flex justify-end" x-data="{ subscriptionsOpen: false }">
                <button @click.prevent="subscriptionsOpen = true" class="btn btn-sm">
                    {{ NotificationSubscriptionType::from($selectedNotificationSubscriptionType)->longDescription() }}
                </button>
                <x-comments::modal @click.outside="subscriptionsOpen = false" bottom compact menu
                                   x-show="subscriptionsOpen">
                    @foreach (NotificationSubscriptionType::cases() as $case)
                        <button @click="subscriptionsOpen = false" class="comments-subscription-item"
                                wire:click="updateSelectedNotificationSubscriptionType('{{ $case->value }}')">
                            {{ $case->description() }}
                        </button>
                    @endforeach
                </x-comments::modal>
            </div>
        @endif
    </header>

    @if ($newestFirst)
        @include('comments::livewire.partials.newComment')
    @endif

    @forelse($this->comments as $comment)
        @continue(!Gate::check('see', $comment))
        <div class="border-b">
            <livewire:comments-comment :key="$comment->id" :comment="$comment" :show-avatar="$showAvatars"
                                       :newest-first="$newestFirst"
                                       :writable="$writable" :show-replies="$showReplies"
                                       :show-reactions="$showReactions"/>
        </div>
    @empty
        <p class="comments-no-comment-yet">{{ $noCommentsText ?? __('comments::comments.no_comments_yet') }}</p>
    @endforelse

    @if ($this->comments->hasPages())
        {{ $this->comments->links() }}
    @endif

    @if (!$newestFirst)
        @include('comments::livewire.partials.newComment')
    @endif
</section>

<div class="comments-group {{ $showAvatar ? 'comments-group-with-avatars' : '' }}" id="comment-{{ $comment->id }}"
    x-data="{ confirmDelete: false, urlCopied: false }"
    x-effect="
        if (urlCopied) {
            window.navigator.clipboard.writeText(window.location.href.split('#')[0] + '#comment-{{ $comment->id }}');
            window.setTimeout(() => urlCopied = false, 2000);
        }
    ">
    <div class="flex">
        @if ($showAvatar)
            <x-comments::avatar :comment="$comment" />
        @endif

        <div class="items w-full p-6">

            <div class="flex flex-col justify-between md:flex-row">
                @if ($url = $comment->commentatorProperties()?->url)
                    <a href="{{ $url }}">
                        {{ $comment->commentatorProperties()->name }}
                    </a>
                @else
                    <span
                        class="font-bold">{{ $comment->commentatorProperties()?->name ?? __('comments::comments.guest') }}</span>
                @endif
                <div class="flex space-x-2 text-sm">

                    <a @click.prevent="urlCopied = true" href="#comment-{{ $comment->id }}">
                        <x-comments::date :date="$comment->created_at" />
                        <span class="comments-comment-header-copied" style="display: none;" x-show="urlCopied">
                            ✓ {{ __('comments::comments.copied') }}!
                        </span>
                    </a>

                    @if ($writable)
                        @can('update', $comment)
                            @if ($isEditing)
                                <a href="#" id="stop"
                                    wire:click.prevent="stopEditing">{{ __('comments::comments.cancel') }}</a>
                            @else
                                <a href="#" id="start"
                                    wire:click.prevent="startEditing">{{ __('comments::comments.edit') }}</a>
                            @endif
                        @endcan
                        @can('delete', $comment)
                            <a @click.prevent="confirmDelete = true"
                                href="#">{{ __('comments::comments.delete') }}</a>
                            <x-comments::modal @click.outside="confirmDelete = false" :title="__('comments::comments.delete_confirmation_title')" bottom right
                                x-show="confirmDelete">
                                <p>{{ __('comments::comments.delete_confirmation_text') }}</p>
                                <x-comments::button danger small wire:click="delete({{ $comment->id }})">
                                    {{ __('comments::comments.delete') }}
                                </x-comments::button>
                            </x-comments::modal>
                        @endcan
                    @endif
                    @include('comments::extraCommentHeaderActions')
                </div>
            </div>

            @if ($comment->isPending())
                <div class="comments-approval">
                    <span>
                        {{ __('comments::comments.awaits_approval') }}
                    </span>
                    <span class="comments-approval-buttons">
                        @can('reject', $comment)
                            <button class="comments-button is-small is-danger" wire:click="reject">
                                {{ __('comments::comments.reject_comment') }}
                            </button>
                        @endcan
                        @can('approve', $comment)
                            <button class="comments-button is-small" wire:click="approve">
                                {{ __('comments::comments.approve_comment') }}
                            </button>
                        @endcan
                    </span>
                </div>
            @endif

            @if ($isEditing)
                <div class="comments-form">
                    <form class="comments-form-inner" wire:submit.prevent="edit">
                        <x-dynamic-component :component="\Spatie\LivewireComments\Support\Config::editor()" :comment="$comment" autofocus model="editText" />
                        @error('editText')
                            <p class="text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                        <x-comments::button submit>
                            {{ __('comments::comments.edit_comment') }}
                        </x-comments::button>
                        <x-comments::button link wire:click="stopEditing">
                            {{ __('comments::comments.cancel') }}
                        </x-comments::button>
                    </form>
                </div>
            @else
                <div>
                    {!! $comment->text !!}
                </div>
                @if ($showReactions)
                    @if ($writable || $comment->reactions->summary()->isNotEmpty())
                        <div class="flex space-x-2">
                            @foreach ($comment->reactions->summary() as $summary)
                                <div @auth
wire:click="toggleReaction('{{ $summary['reaction'] }}')" @endauth
                                    @class([
                                        'btn btn-sm',
                                        'is-reacted' => $summary['commentator_reacted'],
                                    ])
                                    wire:key="{{ $comment->id }}{{ $summary['reaction'] }}">
                                    {{ $summary['reaction'] }} {{ $summary['count'] }}
                                </div>
                            @endforeach

                            @if ($writable)
                                <div @click.outside="open = false" class="comments-reaction-picker" x-cloak
                                    x-data="{ open: false }">
                                    @can('react', $comment)
                                        <button @click="open = !open" aria-label="reaction" class="btn btn-sm"
                                            id="{{ $comment->id }}">
                                            {{--                                            <x-comments::icons.smile /> --}}
                                            <svg class="h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </svg>
                                        </button>
                                        <x-comments::modal compact left x-show="open">
                                            <div class="">
                                                @foreach (config('comments.allowed_reactions') as $reaction)
                                                    @php
                                                        $commentatorReacted = !is_bool(array_search($reaction, array_column($comment->reactions->toArray(), 'reaction')));
                                                    @endphp
                                                    <button @class(['btn btn-sm', 'is-reacted' => $commentatorReacted]) aria-label="reaction"
                                                        id="{{ $comment->id }}" type="button"
                                                        wire:click="toggleReaction('{{ $reaction }}')">
                                                        {{ $reaction }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </x-comments::modal>
                                    @endcan
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            @endif
        </div>
    </div>

    @if ($showReplies && $comment->isTopLevel())
        <div class="comments-nested ml-20">
            @if ($this->newestFirst)
                @if (auth()->check() || config('comments.allow_anonymous_comments'))
                    @include('comments::livewire.partials.replyTo')
                @endif
            @endif
            @foreach ($comment->nestedComments as $nestedComment)
                @continue (! \Illuminate\Support\Facades\Gate::check('see', $nestedComment))
                <livewire:comments-comment :key="$nestedComment->id" :comment="$nestedComment" :show-avatar="$showAvatar" :newest-first="$newestFirst"
                    :writable="$writable" />
            @endforeach
            @if (!$this->newestFirst)
                @if (auth()->check() || config('comments.allow_anonymous_comments'))
                    @include('comments::livewire.partials.replyTo')
                @endif
            @endif
        </div>
    @endif
</div>

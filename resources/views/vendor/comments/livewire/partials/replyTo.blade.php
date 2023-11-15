@if ($writable)
    <div class="comments-form comments-reply flex w-full items-center space-x-4">
        @if ($showAvatar)
            <x-comments::avatar />
        @endif
        <form class="form-control w-full" wire:submit.prevent="reply">
            <div x-data="{ isExpanded: false }" x-on:reply-{{ $comment->id }}="isExpanded = false">
                <input @click="isExpanded = true" @focus="isExpanded = true" class="input input-bordered w-3/4"
                    placeholder="{{ __('comments::comments.write_reply') }}" x-show="!isExpanded">
                <div x-show="isExpanded">
                    <div>
                        <x-dynamic-component :component="\Spatie\LivewireComments\Support\Config::editor()" :comment="$comment" :placeholder="__('comments::comments.write_reply')" autofocus
                            model="replyText" />
                        @error('replyText')
                            <p class="text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                        <x-comments::button primary submit>
                            {{ __('comments::comments.create_reply') }}
                        </x-comments::button>
                        <x-comments::button @click="isExpanded = false" link>
                            {{ __('comments::comments.cancel') }}
                        </x-comments::button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif

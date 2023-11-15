@if($writable && \Illuminate\Support\Facades\Gate::check('createComment', $model))
    <div class="flex space-x-4 w-full my-4">
        @if($showAvatars)
            <x-comments::avatar/>
        @endif
        <form
            class="form-control w-full"
            wire:submit.prevent="comment"
            wire:keydown.cmd.enter="comment"
            wire:keydown.ctrl.enter="comment"
        >
            <x-dynamic-component
                :component="\Spatie\LivewireComments\Support\Config::editor()"
                model="text"
                :placeholder="__('comments::comments.write_comment')"
            />
            @error('text')
            <p class="text-red-600">
                {{ $message }}
            </p>
            @enderror
            <x-comments::button submit :primary="true">
                {{ __('comments::comments.create_comment') }}
            </x-comments::button>
        </form>
    </div>
@endif

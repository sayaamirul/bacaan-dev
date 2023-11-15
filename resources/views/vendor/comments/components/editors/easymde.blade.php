@props([
    'comment' => null,
    'placeholder' => '',
    'model',
    'autofocus' => false,
])
<div
    x-data="{
        text: @entangle($model),
        autofocus: @js($autofocus),
        editor: null,
        clear() {
            if (! this.editor) return;

            this.editor.value('');
        },

        loadEasyMDE() {
            if (window.EasyMDE) {
                return Promise.resolve();
            }

            const loadScript = new Promise((resolve) => {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js';
                script.addEventListener('load', resolve);
                document.getElementsByTagName('head')[0].appendChild(script);
            });

            const loadCss = new Promise((resolve) => {
                const link = document.createElement('link');
                link.type = 'text/css';
                link.rel = 'stylesheet';
                link.href = 'https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css';
                link.addEventListener('load', resolve);
                document.getElementsByTagName('head')[0].appendChild(link);
            });

            return Promise.all([loadScript, loadCss]);
        },

        init() {
            if (this.editor) {
                return;
            }

            const textarea = this.$refs.textarea;

            if (! textarea) {
                return;
            }

            this.loadEasyMDE().then(() => {
                this.editor = new window.EasyMDE({
                    element: textarea,
                    hideIcons: [
                        'heading',
                        'image',
                        'preview',
                        'side-by-side',
                        'fullscreen',
                        'guide',
                    ],
                    autoDownloadFontAwesome: {{ config('comments.ui.autoload_fontawesome', true) ? 'true' : 'false' }},
                    spellChecker: false,
                    status: false,
                    insertTexts: {
                        link: ['[',  '](https://)'],
                    },
                });

                const editor = Alpine.raw(this.editor);

                editor.value(this.text);

                if (this.autofocus) {
                    editor.codemirror.focus();
                    editor.codemirror.setCursor(editor.codemirror.lineCount(), 0);
                }

                editor.codemirror.on('change', () => {
                    this.text = editor.value();
                });
            });
        }
    }"
    @if($comment)
        x-on:reply-{{ $comment->id }}.window="clear"
    @else
        x-on:comment.window="clear"
    @endif
>
    <div wire:ignore>
        <textarea x-ref="textarea" placeholder="{{ $placeholder }}" name="comment" rows="10"></textarea>
    </div>

    <div class="comments-form-editor-tip">
        <p class="text-right text-sm">Kamu bisa gunakan <span class="text-primary">Markdown</span></p>
    </div>
</div>

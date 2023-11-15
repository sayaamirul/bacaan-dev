<?php

use Spatie\Comments\Actions\ApproveCommentAction;
use Spatie\Comments\Actions\ProcessCommentAction;
use Spatie\Comments\Actions\RejectCommentAction;
use Spatie\Comments\Actions\SendNotificationsForApprovedCommentAction;
use Spatie\Comments\Actions\SendNotificationsForPendingCommentAction;
use Spatie\Comments\CommentTransformers\MarkdownToHtmlTransformer;
use Spatie\Comments\Models\Comment;
use Spatie\Comments\Models\CommentNotificationSubscription;
use Spatie\Comments\Models\Reaction;
use Spatie\Comments\Notifications\ApprovedCommentNotification;
use Spatie\Comments\Notifications\PendingCommentNotification;
use Spatie\Comments\Support\CommentSanitizer;

return [
    /*
     * These are the reactions that can be made on a comment. We highly recommend
     * only enabling positive ones for getting good vibes in your community.
     */
    'allowed_reactions' => ['👍', '🥳', '👀', '😍', '💅'],

    /*
     * You can allow guests to post comments. They will not be able to use
     * reactions.
     */
    'allow_anonymous_comments' => false,

    /*
     * A comment transformer is a class that will transform the comment text
     * for example from Markdown to HTML
     */
    'comment_transformers' => [
        MarkdownToHtmlTransformer::class,
    ],

    /*
     * After all transformers have transformed the comment text, it will
     * be passed to this class to sanitize it
     */
    'comment_sanitizer' => CommentSanitizer::class,

    /*
     * Comments need to be approved before they are shown. You can opt
     * to have all comments to be approved automatically.
     */
    'automatically_approve_all_comments' => true,

    'models' => [
        /*
         * The class that will comment on other things. Typically, this
         * would be a user model.
         */
        'commentator' => \App\Models\User::class,

        /*
         * The field to use to display the name from the commentator model.
         */
        'name' => 'name',

        /*
         * The model you want to use as a Comment model. It needs to be or
         * extend the `Spatie\Comments\Models\Comment::class` model.
         */
        'comment' => Comment::class,

        /*
         * The model you want to use as a React model. It needs to be or
         * extend the `Spatie\Comments\Models\Reaction::class` model.
         */
        'reaction' => Reaction::class,

        /*
         * The model you want to use as an subscription model. It needs to be or
         * extend the `Spatie\Comments\Models\CommentNotificationSubscription::class` model.
         */
        'comment_notification_subscription' => CommentNotificationSubscription::class,
    ],

    'notifications' => [
        /*
         * When somebody creates a comment, a notification will be sent to other persons
         * that commented on the same thing.
         */
        'enabled' => true,

        'notifications' => [
            'pending_comment' => PendingCommentNotification::class,
            'approved_comment' => ApprovedCommentNotification::class,
        ],

        /*
         * Here you can configure the notifications that will be sent via mail.
         */
        'mail' => [
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                'name' => env('MAIL_FROM_NAME', 'Example'),
            ],
        ],
    ],

    'pagination' => [
        /*
         * Here you can configure the number of results to show before
         * pagination links are displayed.
         */
        'results' => 10000,

        /*
         * If you have multiple paginators on the same page, you can configure the
         * query string page name to avoid conflicts with the other paginator.
         * For example, you could set the page_name to be 'comments_page'.
         */
        'page_name' => 'page',

        /*
         * You can choose a different pagination theme like "simple-tailwind" or build
         * a custom pagination "vendor.livewire.custom-pagination" See the livewire
         * docs for more information: https://laravel-livewire.com/docs/2.x/pagination#custom-pagination-view
         */
        'theme' => 'tailwind',
    ],

    /*
     * Unless you need fine-grained customization, you don't need to change
     * these action classes. If you do change any of them, make sure that your class
     * extends the original action class.
     */
    'actions' => [
        'process_comment' => ProcessCommentAction::class,
        'send_notifications_for_pending_comment' => SendNotificationsForPendingCommentAction::class,
        'approve_comment' => ApproveCommentAction::class,
        'reject_comment' => RejectCommentAction::class,
        'send_notifications_for_approved_comment' => SendNotificationsForApprovedCommentAction::class,
    ],

    'gravatar' => [
        /*
         * Here you can choose which default image to show when a user does not have a Gravatar profile.
         * See the Gravatar docs for further information https://en.gravatar.com/site/implement/images/
         */
        'default_image' => 'mp',
    ],
];

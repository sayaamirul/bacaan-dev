<?php

namespace App\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use Tempest\Highlight\CommonMark\CodeBlockRenderer;
use Tempest\Highlight\CommonMark\InlineCodeBlockRenderer;

class MarkdownRenderer
{
    public function render($content)
    {
        $config = [
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'id_prefix' => 'content',
                'apply_id_to_heading' => false,
                'heading_class' => '',
                'fragment_prefix' => 'content',
                'insert' => 'before',
                'min_heading_level' => 1,
                'max_heading_level' => 6,
                'title' => 'Permalink',
                'symbol' => '#',
                'aria_hidden' => true,
            ],
        ];

        $environment = new Environment($config);

        $environment
            ->addExtension(new CommonMarkCoreExtension())
            ->addRenderer(FencedCode::class, new CodeBlockRenderer())
            ->addExtension(new HeadingPermalinkExtension())
            ->addExtension(new TableOfContentsExtension())
            ->addRenderer(Code::class, new InlineCodeBlockRenderer());

        $markdown = new MarkdownConverter($environment);

        return $markdown->convert($content);
    }
}

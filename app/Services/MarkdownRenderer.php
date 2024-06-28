<?php

namespace App\Services;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use League\CommonMark\MarkdownConverter;
use Tempest\Highlight\CommonMark\CodeBlockRenderer;
use Tempest\Highlight\CommonMark\InlineCodeBlockRenderer;

class MarkdownRenderer
{
    public function render($content)
    {
        $environment = new Environment();

        $environment
            ->addExtension(new CommonMarkCoreExtension())
            ->addRenderer(FencedCode::class, new CodeBlockRenderer())
            ->addRenderer(Code::class, new InlineCodeBlockRenderer());

        $markdown = new MarkdownConverter($environment);

        return $markdown->convert($content);
    }
}

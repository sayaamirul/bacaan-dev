<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\ArticleView;
use App\Services\MarkdownRenderer;
use Livewire\Component;

class SingleArticle extends Component
{
    public Article $article;

    public function render()
    {
        ArticleView::updateOrCreate([
            'article_id' => $this->article->id,
            'ip_address' => request()->ip(),
        ]);

        if ($this->article->series) {
            $seriesEpisode = [
                'next' => Article::seriesEpisode(
                    $this->article->series_id,
                    $this->article->episode + 1
                )->first() ?? null,
                'prev' => Article::seriesEpisode(
                    $this->article->series_id,
                    $this->article->episode - 1
                )->first() ?? null,
            ];
        }

        return view('livewire.article.single-article', [
            'populars' => Article::withCount('views')
                ->whereNot('id', $this->article->id)
                ->orderBy('views_count')
                ->take(5)
                ->get(),
            'articleBody' => (new MarkdownRenderer())->render($this->article->content),
            'seriesEpisode' => $seriesEpisode ?? null,
        ])
            ->layout('components.layouts.two-columns-right');
    }
}

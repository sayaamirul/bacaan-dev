<?php

namespace App\Livewire\Article;

use App\Models\Article;
use App\Models\ArticleView;
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
                'next' => Article::seriesEpisode($this->article->series_id,
                    $this->article->episode + 1)->first() ?? null,
                'prev' => Article::seriesEpisode($this->article->series_id,
                    $this->article->episode - 1)->first() ?? null,
            ];
        }

        return view('livewire.article.single-article', [
            'populars' => Article::withCount('views')
                ->whereNot('id', $this->article->id)
                ->orderBy('views_count')
                ->take(5)
                ->get(),
            'seriesEpisode' => $seriesEpisode ?? null,
        ])
            ->layout('components.layouts.three-columns');
    }
}

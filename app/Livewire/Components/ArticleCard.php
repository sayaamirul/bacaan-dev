<?php

namespace App\Livewire\Components;

use App\Models\Article;
use Livewire\Component;

class ArticleCard extends Component
{
    public Article $article;

    public function render()
    {
        return view('livewire.components.article-card');
    }
}

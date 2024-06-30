<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ListArticle extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.article.list-article', [
            'articles' => Article::latest('published_at')
                ->published()
                ->paginate(9),
        ]);
    }
}

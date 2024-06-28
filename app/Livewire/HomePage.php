<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Snippet;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home-page', [
            'articles' => Article::with('user')
                ->latest('published_at')
                ->published()
                ->paginate(10),
            'snippets' => Snippet::inRandomOrder()->take(5)->get(),
        ]);
        // ->layout('components.layouts.three-columns');
    }
}

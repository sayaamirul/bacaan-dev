<?php

namespace App\Livewire\Snippet;

use App\Models\Snippet;
use Livewire\Component;

class SingleSnippet extends Component
{
    public Snippet $snippet;

    public function render()
    {
        return view('livewire.snippet.single-snippet')
            ->layout('components.layouts.three-columns');
    }
}

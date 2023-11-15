<?php

namespace App\Livewire\Snippet;

use App\Models\Snippet;
use Livewire\Component;

class ListSnippet extends Component
{
    public function render()
    {
        return view('livewire.snippet.list-snippet', [
            'snippets' => Snippet::latest('id')->get(),
        ]);
    }
}

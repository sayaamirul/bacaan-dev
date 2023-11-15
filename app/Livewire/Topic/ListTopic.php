<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;

class ListTopic extends Component
{
    public function render()
    {
        return view('livewire.topic.list-topic', [
            'topics' => Topic::withCount('articles')->orderBy('name', 'asc')->get(),
        ]);
    }
}

<?php

namespace App\Livewire\Topic;

use App\Models\Topic;
use Livewire\Component;

class SingleTopic extends Component
{
    public Topic $topic;

    public function render()
    {
        return view('livewire.topic.single-topic', [
            'articles' => $this->topic->loadCount('articles')->articles()->paginate(10),
        ]);
    }
}

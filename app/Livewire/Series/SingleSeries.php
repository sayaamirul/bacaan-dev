<?php

namespace App\Livewire\Series;

use App\Models\Series;
use Livewire\Component;

class SingleSeries extends Component
{
    public Series $series;

    public function render()
    {
        return view('livewire.series.single-series');
    }
}

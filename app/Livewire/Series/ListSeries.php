<?php

namespace App\Livewire\Series;

use App\Models\Series;
use Livewire\Component;

class ListSeries extends Component
{
    public function render()
    {
        return view('livewire.series.list-series', [
            'series' => Series::latest('id')->get(),
        ]);
    }
}

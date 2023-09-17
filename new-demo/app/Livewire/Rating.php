<?php

namespace App\Livewire;

use Livewire\Component;

class Rating extends Component
{

    public int $rating;

    public function render()
    {
        return view('livewire.rating');
    }
}

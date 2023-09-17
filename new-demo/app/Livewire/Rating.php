<?php

namespace App\Livewire;

use Livewire\Component;

class Rating extends Component
{

    public int $rating;

    /**
     * Render the Star Rating Component 
     */
    public function render()
    {
        return view('livewire.rating');
    }
}

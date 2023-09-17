<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Rating extends Component
{

    public int $rating;
    public int $soupId;

    protected $listeners = ['soupUpdated' => 'refreshRating'];

    /**
     * Render the Star Rating Component 
     */
    public function render()
    {
        return view('livewire.rating');
    }

    /**
     * Refresh the rating when a soup is updated
     * @param int $soupId
     * @param int $newRating 
     * @return void 
     */
    public function refreshRating($updatedSoupId, $newRating): void
    {
        if ($this->soupId == $updatedSoupId) {
            $this->rating = $newRating;
            $this->render();
        }
    }
}

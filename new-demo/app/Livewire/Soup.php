<?php

namespace App\Livewire;

use App\Models\Soup as Soups;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Events\SoupCreated;


class Soup extends Component
{
    public Collection $soups;
    public ?int $soupId;
    public ?int $user_id;
    public ?string $name;
    public ?string $description;
    public ?int $rating;
    public ?float $cost;
    public bool $updateSoupModal = false;
    public bool $addSoupModal = false;
    public string $title = 'My Soups';

    /**
     * List of the add/edit form rules.
     */
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'rating' => 'required|digits_between:1,5',
        'cost' => 'required|numeric'
    ];

    /**
     * Render the Component
     */
    public function render()
    {
        $this->soups = Soups::where('user_id', Auth::user()->id)->get();
        return view('livewire.soup');
    }

    /**
     * Reset the fields
     * @return void
     */
    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->rating = null;
        $this->cost = null;
    }

    /**
     * Flash Server Error 
     */
    public function serverError()
    {
        session()->flash('error', 'Something went wrong!');
    }

    /**
     * Open the add soup form
     * @return void 
     */
    public function addSoup()
    {
        $this->resetFields();
        $this->addSoupModal = true;
        $this->updateSoupModal = false;
    }

    /**
     * Store a new Soup
     * @return void 
     */
    public function storeSoup()
    {
        $this->validate();
        try {
            Soups::create([
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'description' => $this->description,
                'rating' => $this->rating,
                'cost' => $this->cost,
            ]);


            event(new SoupCreated(Auth::user()->email));

            session()->flash('success', 'Soup created');
            $this->resetFields();
            $this->addSoupModal = false;
        } catch (\Exception $ex) {
            Log::error('Store Soup Error', [
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }

    /**
     * get existing soup and show edit form
     */
    public function editSoup(int $id)
    {
        try {
            $soup = Soups::find($id);

            if (!$soup) {
                session()->flash('error', 'Soup not found');
                return;
            }

            if ($soup->user_id !== Auth::user()->id) {
                session()->flash('error', 'You do not own this soup!');
                return;
            }

            $this->soupId = $soup->id;
            $this->name = $soup->name;
            $this->description = $soup->description;
            $this->rating = $soup->rating;
            $this->cost = $soup->cost;
            $this->updateSoupModal = true;
            $this->addSoupModal = false;
        } catch (\Exception $ex) {
            Log::error('Edit Soup Error', [
                'data' => $id,
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }

    /**
     * Update the selected soup
     * @return void
     */

    public function updateSoup()
    {
        $this->validate();
        try {
            Soup::find($this->soupId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'rating' => $this->rating,
                'cost' => $this->cost,
            ]);
            $this->resetFields();
            $this->updateSoupModal = false;
            session()->flash('success', 'Soup updated');
        } catch (\Exception $ex) {
            Log::error('Update Soup Error', [
                'data' => $this->soupId,
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }

    /**
     * Cancel Add/Edit soup Form
     * @return void
     */
    public function cancelSoup()
    {
        $this->addSoupModal = false;
        $this->updateSoupModal = false;
        $this->resetFields();
    }

    /**
     * delete soup
     * @param mixed $id
     * @return void
     */
    public function deleteSoup($id)
    {
        try {
            Soups::find($id)->delete();
            session()->flash('success', "Soup Deleted Successfully!!");
        } catch (\Exception $ex) {
            Log::error('Delete Soup Error', [
                'data' => $id,
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }
}

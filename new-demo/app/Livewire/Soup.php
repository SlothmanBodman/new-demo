<?php

namespace App\Livewire;

use App\Models\Soup as Soups;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Events\SoupCreated;
use Exception;

class Soup extends Component
{
    public Collection $soups;
    public ?int $id;
    public ?string $name;
    public ?string $description;
    public ?int $rating;
    public ?float $cost;
    public bool $addSoupModal = false;
    public bool $editSoupModal = false;

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
        Log::info('Add Soup');
        $this->resetFields();
        $this->editSoupModal = false;
        $this->addSoupModal = true;
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
            session()->flash('success', 'Soup created');
            event(new SoupCreated(Auth::user()->email));

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
     * Edit Soup
     * @param int $id
     * @return void 
     */
    public function editSoup(int $id): void
    {
        try {
            $soup = Soups::find($id);

            if (!$soup) {
                session()->flash('error', 'Soup not found.');
            }

            if ($soup->user_id != Auth::user()->id) {
                session()->flash('error', 'You do not own this soup.');
            }

            $this->id = $soup->id;
            $this->name = $soup->name;
            $this->description = $soup->description;
            $this->rating = $soup->rating;
            $this->cost = $soup->cost;
            $this->addSoupModal = false;
            $this->editSoupModal = true;
        } catch (Exception $ex) {
            Log::error('Edit Soup Error', [
                'id' => $id,
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }

    /**
     * Update Soup
     */

    public function updateSoup()
    {
        $this->validate();
        try {
            Soups::whereId($this->id)->update([
                'name' => $this->name,
                'description' => $this->description,
                'rating' => $this->rating,
                'cost' => $this->cost,
            ]);
            session()->flash('success', 'Your soup has been updated!');
            $this->resetFields();
            $this->editSoupModal = false;
        } catch (Exception $ex) {
            Log::error('Update Soup Error', [
                'id' => $this->id,
                'exception' => $ex
            ]);
            $this->serverError();
        }
    }

    /**
     * Cancel Add soup Form
     * @return void
     */
    public function cancelSoup()
    {
        $this->addSoupModal = false;
        $this->editSoupModal = false;
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

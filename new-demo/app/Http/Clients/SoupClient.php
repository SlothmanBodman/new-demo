<?php

namespace App\Http\Clients;

use App\Models\Soup;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SoupClient
{

    private int $user_id;
    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }
    /**
     * Index
     * @return Soup
     */
    public function index()
    {
        try {
            return Soup::where('id', $this->user_id)->get();
        } catch (Exception $error) {
            Log::error('Index Soup Error', [
                $error,
            ]);
            throw $error;
        }
    }

    /**
     * Show soup
     * @param int $id
     * @return Soup
     * @throws Exception
     */
    public function show(int $id): Soup
    {
        try {
            return Soup::find($id)->where('id', $this->user_id);
        } catch (Exception $error) {
            Log::error('Show Soup Error', [
                $id,
                $error,
            ]);
            throw $error;
        }
    }
    /**
     * Create Soup
     * @param string $name
     * @param string $description
     * @param int $rating
     * @param float $rating
     * @return void
     */
    public function create(
        string $name,
        string $description,
        int $rating,
        float $cost
    ): void {
        try {
            Soup::create([
                'user_id' => $this->user_id,
                'name' => $name,
                'description' => $description,
                'rating' => $rating,
                'cost' => $cost,
            ]);
        } catch (Exception $error) {
            Log::error('Create Soup Error', [
                $error,
            ]);
            throw $error;
        }
    }

    /**
     * Update
     * @param int $id
     * @param string $name
     * @param string $description
     * @param int $rating
     * @param float $cost
     * @return void
     * @throws Exception
     */
    public function update(
        int $id,
        string $name,
        string $description,
        int $rating,
        float $cost
    ) {
        try {
            Soup::find($id)->update([
                'name' => $name,
                'description' => $description,
                'rating' => $rating,
                'cost' => $cost,
            ]);
        } catch (Exception $error) {
            Log::error('Update Soup Error', [
                $id,
                $error,
            ]);
            throw $error;
        }
    }

    /**
     * Delete
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id): void
    {
        try {
            Soup::findOrFail($id)->delete();
        } catch (Exception $error) {
            Log::error('Delete Soup Error', [
                $id,
                $error,
            ]);
            throw $error;
        }
    }
}

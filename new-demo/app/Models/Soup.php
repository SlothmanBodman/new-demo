<?php

namespace App\Models;

use App\Models\User;
use App\Services\BusinessToolsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Soup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, float>
     */
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "rating",
        "cost"
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function costWithVat(): float
    {
        $service = new BusinessToolsService;
        return $service->calculateCostWithVAT($this->cost);
    }
}

<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'telephone'
    ];

    public function cities()
    {
        return $this->BelongsTo(City::class);
    }
}

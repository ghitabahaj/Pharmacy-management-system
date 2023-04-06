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
        'employees' ,
        'telephone',
        'city_id'

    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

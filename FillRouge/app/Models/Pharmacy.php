<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'employees' ,
        'telephone',
        'city_id',
        'status'

    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}

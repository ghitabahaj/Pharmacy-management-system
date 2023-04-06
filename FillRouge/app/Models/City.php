<?php

namespace App\Models;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name','province','pharmaciesnum','PostalCode'];

    public function Pharmacy()
    {
        return $this->hasMany(Pharmacy::class);
    }
}

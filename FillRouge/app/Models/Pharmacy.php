<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Medicine;
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

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function medicine(){
        return $this->BelongsToMany(Medicine::class,'medicine_pharmacy','pharmacy_id','medicine_id');
    }
}

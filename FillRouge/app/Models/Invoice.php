<?php

namespace App\Models;

use App\Models\User;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientName',
        'total',
        'medicine_id',
        'user_id',
        'date'
    ];

    public function Medicine()
    {
        return $this->hasMany(Medicine::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}

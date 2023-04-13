<?php

namespace App\Models;

use App\Models\User;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'clientName',
        'total',
        'user_id',
        'date',
        'total'
    ];

    public function Medicine()
    {
        return $this->BelongsToMany(Medicine::class,'invoice_medicine', 'invoice_id', 'medicine_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }


}

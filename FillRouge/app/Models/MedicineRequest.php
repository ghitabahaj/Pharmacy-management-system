<?php

namespace App\Models;

use App\Models\User;
use App\Models\Medicine;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineRequest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'visitor_id', 'pharmacy_id', 'medicine_id', 'quantity', 'is_handled'
    ];

    public function visitor()
    {
        return $this->belongsTo(User::class, 'visitor_id');
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}

<?php

namespace App\Models;

use App\Models\Invoice;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'label',
        'expiration_date',
        'quantity',
        'price',
        'Provider',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Invoice()
    {
        return $this->BelongsToMany(Invoice::class,'invoice_medicine', 'medicine_id', 'invoice_id');
    }

}

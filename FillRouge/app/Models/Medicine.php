<?php

namespace App\Models;

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
        'price'
    ];

    public function categories()
    {
        return $this->HasOne(Category::class);
    }
}

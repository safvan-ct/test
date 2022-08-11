<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;
    protected $guarded;
    protected $table = 'product_ingredient';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

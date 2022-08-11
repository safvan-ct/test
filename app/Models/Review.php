<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'rating',
        'name',
        'email',
        'review',
        'is_active',
    ];
    protected $table = 'reviews';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

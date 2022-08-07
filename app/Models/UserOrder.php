<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getProductNameAttribute($value)
    {
        return explode('@p', $value);
    }

    public function getProductQtyAttribute($value)
    {
        return explode(',', $value);
    }

    public function getProductPriceAttribute($value)
    {
        return explode(',', $value);
    }

    public function getProductImageAttribute($value)
    {
        return explode(',', $value);
    }

    public function getProductSizeAttribute($value)
    {
        return explode(',', $value);
    }

    public function getProductColorAttribute($value)
    {
        return explode(',', $value);
    }
}

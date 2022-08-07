<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;
    protected $guarded;

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function ActiveReview() {
        return $this->review()->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function getImageAttribute($value)
    {
        return explode(',', $value);
    }

    public function getSizeAttribute($value)
    {
        return array_filter(explode(',', $value));
    }

    public function getColorAttribute($value)
    {
        return array_filter(explode(',', $value));
    }
}

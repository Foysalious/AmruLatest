<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\ProductImage;

class Product extends Model
{
    use HasFactory;

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }


    public function import(){
        return $this->hasMany(ProductOrder::class, "product_id", 'id');
    }

    public function waste(){
        return $this->hasMany(Waste::class, 'p_id', 'id');
    }
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class, 'p_id', 'id');
    }
}

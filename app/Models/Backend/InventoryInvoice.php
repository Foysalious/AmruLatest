<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryInvoice extends Model
{
    use HasFactory;

    public function order(){
        return $this->hasMany(ProductOrder::class, 'invoice_id', 'id');
    }
}

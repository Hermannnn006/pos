<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id', 'batch_code', 'type', 'quantity',
        'reference_type', 'reference_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

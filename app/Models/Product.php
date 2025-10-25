<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ReturnItem;
use App\Models\StockMovement;
use App\Models\PurchaseDetail;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
        'category_id', 'barcode', 'name', 'slug',
        'stock', 'selling_price', 'unit', 'min_stock', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}

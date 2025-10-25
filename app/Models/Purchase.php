<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\PurchaseDetail;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_id', 'invoice_code', 'total_cost', 'note'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
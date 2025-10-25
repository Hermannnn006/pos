<?php

namespace App\Models;

use App\Models\User;
use App\Models\ReturnItem;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'kasir_id', 'code', 'total_amount',
        'payment_method', 'paid_amount', 'change_amount'
    ];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function returnItems()
    {
        return $this->hasMany(ReturnItem::class);
    }
}
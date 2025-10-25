<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\StockMovement;
use Illuminate\Database\Seeder;

class ReturnItemSeeder extends Seeder
{
    public function run(): void
    {
        $transaction = Transaction::latest()->first();
        $product = Product::first();

        $return = ReturnItem::create([
            'transaction_id' => $transaction->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'reason' => 'Barang rusak saat diterima pelanggan',
        ]);

        StockMovement::create([
            'product_id' => $product->id,
            'batch_code' => 'BATCH-' . strtoupper(Str::random(4)),
            'type' => 'in',
            'quantity' => 1,
            'reference_type' => 'return',
            'reference_id' => $return->id,
        ]);
    }
}

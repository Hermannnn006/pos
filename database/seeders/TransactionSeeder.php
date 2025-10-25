<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\StockMovement;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $kasir = User::whereHas('roles', fn($q) => $q->where('name', 'kasir'))->first();
        $products = Product::all();

        $transaction = Transaction::create([
            'kasir_id' => $kasir->id,
            'code' => 'TRX-' . strtoupper(Str::random(6)),
            'total_amount' => 0,
            'payment_method' => 'cash',
            'paid_amount' => 0,
            'change_amount' => 0,
        ]);

        $total = 0;
        foreach ($products->take(3) as $product) {
            $qty = rand(1, 5);
            $subtotal = $qty * $product->selling_price;

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $qty,
                'product_price' => $product->selling_price,
                'subtotal' => $subtotal,
                'batch_code' => 'BATCH-' . strtoupper(Str::random(4)),
            ]);

            $total += $subtotal;
            $product->decrement('stock', $qty);

            StockMovement::create([
                'product_id' => $product->id,
                'batch_code' => 'BATCH-' . strtoupper(Str::random(4)),
                'type' => 'out',
                'quantity' => $qty,
                'reference_type' => 'sale',
                'reference_id' => $transaction->id,
            ]);
        }

        $transaction->update([
            'total_amount' => $total,
            'paid_amount' => $total,
            'change_amount' => 0,
        ]);
    }
}

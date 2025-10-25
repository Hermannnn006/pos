<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\StockMovement;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $supplier = Supplier::first();
        $products = Product::all();

        $purchase = Purchase::create([
            'supplier_id' => $supplier->id,
            'invoice_code' => 'INV-' . strtoupper(Str::random(6)),
            'total_cost' => 0,
            'note' => 'Stok awal gudang',
        ]);

        $totalCost = 0;

        foreach ($products as $product) {
            $qty = rand(10, 30);
            $cost = $product->selling_price - rand(500, 1000);

            $detail = PurchaseDetail::create([
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'batch_code' => 'BATCH-' . strtoupper(Str::random(5)),
                'quantity' => $qty,
                'cost_price' => $cost,
                'received_at' => now(),
            ]);

            $totalCost += $qty * $cost;
            $product->increment('stock', $qty);

            StockMovement::create([
                'product_id' => $product->id,
                'batch_code' => $detail->batch_code,
                'type' => 'in',
                'quantity' => $qty,
                'reference_type' => 'purchase',
                'reference_id' => $purchase->id,
            ]);
        }

        $purchase->update(['total_cost' => $totalCost]);
    }
}

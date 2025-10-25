<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StockMovement;

class StockMovementSeeder extends Seeder
{
    public function run(): void
    {
        // Tidak perlu data tambahan karena sudah diisi otomatis dari PurchaseSeeder & TransactionSeeder.
        $count = StockMovement::count();
        $this->command->info("StockMovementSeeder: {$count} record sudah ada dari seed lain.");
    }
}

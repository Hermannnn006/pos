<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PurchaseSeeder;
use Database\Seeders\SupplierSeeder;
use Database\Seeders\MasterDataSeeder;
use Database\Seeders\ReturnItemSeeder;
use Database\Seeders\TransactionSeeder;
use Database\Seeders\StockMovementSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            PurchaseSeeder::class,
            TransactionSeeder::class,
            ReturnItemSeeder::class,
            StockMovementSeeder::class,
        ]);
    }
}

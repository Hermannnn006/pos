<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // Categories
        $categories = ['Makanan', 'Minuman', 'ATK', 'Elektronik'];
        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Supplier
        \App\Models\Supplier::firstOrCreate([
            'name' => 'PT Sumber Makmur',
            'contact_name' => 'Budi Santoso',
            'phone' => '081234567890',
            'email' => 'supplier@sumbermakmur.com',
            'address' => 'Jl. Merdeka No. 12, Jakarta',
        ]);

        // Products (stok akan ditambahkan di PurchaseSeeder)
        Product::firstOrCreate([
            'category_id' => 1,
            'barcode' => '899001001',
            'name' => 'Indomie Goreng',
            'slug' => 'indomie-goreng',
            'unit' => 'pcs',
            'stock' => 0,
            'min_stock' => 10,
            'cost_price' => 2500,
            'selling_price' => 3500,
        ]);

        Product::firstOrCreate([
            'category_id' => 2,
            'barcode' => '899002002',
            'name' => 'Aqua Botol 600ml',
            'slug' => 'aqua-botol-600ml',
            'unit' => 'botol',
            'stock' => 0,
            'min_stock' => 10,
            'cost_price' => 3000,
            'selling_price' => 5000,
        ]);
    }
}

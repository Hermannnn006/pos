<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        $data = [
            ['Mie Instan', 'PCS', 3000],
            ['Teh Botol', 'BOTOL', 5000],
            ['Buku Tulis', 'BUKU', 8000],
            ['Mouse Wireless', 'UNIT', 75000],
            ['Shampoo 200ml', 'BOTOL', 20000],
        ];

        foreach ($data as $i => $p) {
            Product::firstOrCreate([
                'barcode' => 'BR' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
            ], [
                'category_id' => $categories[$i % $categories->count()]->id,
                'name' => $p[0],
                'slug' => Str::slug($p[0]),
                'stock' => rand(20, 100),
                'selling_price' => $p[2],
                'unit' => $p[1],
                'min_stock' => 10,
                'image' => null,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'PT Sumber Rejeki', 'contact_name' => 'Budi', 'phone' => '081234567890', 'email' => 'budi@sumber.com', 'address' => 'Jl. Merdeka No. 12'],
            ['name' => 'CV Maju Jaya', 'contact_name' => 'Siti', 'phone' => '082233445566', 'email' => 'siti@majujaya.com', 'address' => 'Jl. Mawar No. 8'],
        ];

        foreach ($data as $item) Supplier::firstOrCreate($item);
    }
}

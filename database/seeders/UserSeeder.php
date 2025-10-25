<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $kasirRole = Role::where('name', 'kasir')->first();

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        $kasir = User::firstOrCreate(
            ['email' => 'kasir@example.com'],
            [
                'name' => 'Kasir Utama',
                'password' => Hash::make('password'),
            ]
        );
        $kasir->assignRole($kasirRole);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // ================================
        // DAFTAR PERMISSIONS
        // ================================
        $permissions = [
            'manage users',
            'manage products',
            'manage categories',
            'manage suppliers',
            'manage purchases',
            'manage sales',
            'view reports',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ================================
        // BUAT ROLE
        // ================================
        $admin   = Role::firstOrCreate(['name' => 'admin']);
        $kasir   = Role::firstOrCreate(['name' => 'kasir']);
        $manajer = Role::firstOrCreate(['name' => 'manajer']);

        // ================================
        // BERIKAN PERMISSIONS
        // ================================
        $admin->givePermissionTo(Permission::all());

        $kasir->syncPermissions([
            'manage sales',
            'manage products',
        ]);

        $manajer->syncPermissions([
            'view reports',
            'manage suppliers',
            'manage purchases',
        ]);

        // Log ke console saat seeding
        $this->command->info('✅ Roles dan Permissions berhasil dibuat!');
    }
}

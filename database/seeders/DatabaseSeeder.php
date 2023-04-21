<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Agent']);
        $role3 = Role::create(['name' => 'Client']);
        $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '0329368007',
                'password' => Hash::make(config('auth.administrator.password')),
        ]);
        $admin->assignRole($role1);
    }
}

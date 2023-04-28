<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Agent']);
        $role3 = Role::create(['name' => 'Client']);
        $permission1 = Permission::create(['name' => 'create post']);
        $permission2 = Permission::create(['name' => 'edit post']);
        $permission3 = Permission::create(['name' => 'delete post']);
        $permission4 = Permission::create(['name' => 'view post']);
        $role2->givePermissionTo($permission1);
        $role2->givePermissionTo($permission2);
        $role2->givePermissionTo($permission3);
        $role3->givePermissionTo($permission4);
    }
}

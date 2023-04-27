<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                    'name' => 'admin',
                    'email' => "admin.$i.@gmail.com",
                    'phone' => '0329368007',
                    'password' => Hash::make('123qweasd'),
            ]);
        }
        $users = User::all();

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
        foreach ($users as $user) {
            $user->assignRole($role2) || $user->assignRole($role3);
        }
        $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '0329368007',
                'password' => Hash::make(config('auth.administrator.password')),
        ]);
        $admin->assignRole($role1);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $users = User::factory(10)->create();

        $this->call([
                RoleSeeder::class,
                CategorySeeder::class,
                PlanSeeder::class,
        ]);
        foreach ($users as $user) {
            $user->assignRole('Agent') or $user->assignRole('Client');
        }
        $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '0329368007',
                'password' => Hash::make(config('auth.administrator.password')),
        ]);
        $admin->assignRole('Super Admin');

    }
}

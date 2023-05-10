<?php

namespace Database\Seeders;

use Bpuig\Subby\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
                'tag' => 'trial',
                'name' => 'Dùng thử',
                'description' => 'Gói dùng thử',
                'price' => 0,
                'signup_fee' => 0,
                'trial_period' => 7,
                'trial_interval' => 'day',
                'invoice_period' => 0,
                'invoice_interval' => 'month',
                'grace_period' => 0,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'USD',
        ]);

        Plan::create([
                'tag' => '1M',
                'name' => 'Gói 1 tháng',
                'description' => 'Gói 1 tháng',
                'price' => 5,
                'signup_fee' => 0,
                'trial_period' => 0,
                'trial_interval' => 'day',
                'invoice_period' => 1,
                'invoice_interval' => 'month',
                'grace_period' => 3,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'USD',
        ]);

        Plan::create([
                'tag' => '6M',
                'name' => 'Gói 6 tháng',
                'description' => 'Gói 6 tháng',
                'price' => 20,
                'signup_fee' => 0,
                'trial_period' => 0,
                'trial_interval' => 'month',
                'invoice_period' => 6,
                'invoice_interval' => 'month',
                'grace_period' => 10,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'USD',
        ]);

        Plan::create([
                'tag' => '12M',
                'name' => 'Gói 12 tháng',
                'description' => 'Gói 12 tháng',
                'price' => 35,
                'signup_fee' => 0,
                'trial_period' => 0,
                'trial_interval' => 'month',
                'invoice_period' => 12,
                'invoice_interval' => 'month',
                'grace_period' => 30,
                'grace_interval' => 'day',
                'tier' => 1,
                'currency' => 'USD',
        ]);
    }
}

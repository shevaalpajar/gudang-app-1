<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            \App\Models\Order::factory(3)->create([
                'user_id' => $user->user_id,
            ]);
        }
    }
}

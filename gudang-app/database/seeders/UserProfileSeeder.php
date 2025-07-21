<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            \App\Models\UserProfile::factory()->create([
                'user_id' => $user->user_id,
            ]);
        }
    }
}

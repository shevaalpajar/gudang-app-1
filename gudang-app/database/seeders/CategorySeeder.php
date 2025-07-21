<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Category::insert([
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Elektronik'],
            ['name' => 'Alat Tulis'],
            ['name' => 'Pakaian'],
        ]);
    }
} 
<?php

namespace Database\Seeders;

use App\Models\Soup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soup::factory()->count(20)->create();
    }
}

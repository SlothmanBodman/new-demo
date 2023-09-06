<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => 'Jack Bodman',
                'email' => 'jack.bodman1998@outlook.com',
                'password' => Hash::make('password')
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('password')
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'password' => Hash::make('password')
            ],
        );
    }
}

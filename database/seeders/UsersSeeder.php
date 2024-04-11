<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@erdituzun.com.tr',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],

            // Teacher

            [
                'name' => 'Teacher',
                'username' => 'teacher',
                'email' => 'teacher@erdituzun.com.tr',
                'password' => Hash::make('111'),
                'role' => 'teacher',
                'status' => 'active',
            ],

            // Student

            [
                'name' => 'Student',
                'username' => 'student',
                'email' => 'student@erdituzun.com.tr',
                'password' => Hash::make('111'),
                'role' => 'student',
                'status' => 'active',
            ],

        ]);
    }
}

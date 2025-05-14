<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['name' => 'root',
            'role' => 'superadmin',
            'active_user' => 1,
            'email' => 'fake@fake.com',
            'password'=>Hash::make('rootpassword')
        ]);

    }
}

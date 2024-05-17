<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),

        ]);
        $admin->assignRole('admin');

        $parent = User::create([
            'name' => 'Parent',
            'email' => 'parenttest@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),

        ]);
        $parent->assignRole('parent');
}
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->assignRole('super_admin');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'ahmed alaa',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->assignRole('student');
    }
}

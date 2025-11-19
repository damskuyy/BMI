<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin BMI',
            'email' => 'admin@bmi.com',
            'password' => Hash::make('bmi2025')
        ]);

        // Seed products
        $this->call(ProductSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(BlogSeeder::class);
    }
}

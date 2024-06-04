<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\VisitorSeeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'username' => 'admin1',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        // ]);
        $this->call([
            VisitorSeeder::class,
        ]);
    }
}

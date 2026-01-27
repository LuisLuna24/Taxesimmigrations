<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Luis Luna',
            'email' => 'admin@gmail.com',
            'password' => 'admin123#',
            'status' => 1
        ]);

        Comment::factory(10)->validado()->create();
    }
}

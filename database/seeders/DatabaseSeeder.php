<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\TypeUser;
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

        TypeUser::create([
            'name' => 'Admin'
        ]);

        TypeUser::create([
            'name' => 'Employee'
        ]);

        TypeUser::create([
            'name' => 'Client'
        ]);

        User::create([
            'name' => 'Luis Luna',
            'email' => 'admin@gmail.com',
            'password' => 'admin123#',
            'type_user_id' => 1,
            'status' => 1
        ]);

        Comment::factory(10)->validado()->create();
    }
}

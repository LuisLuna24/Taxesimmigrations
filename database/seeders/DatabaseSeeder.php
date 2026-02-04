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
        $this->call([
            TypeUserSeeder::class,
            PermissionsSeeder::class,
            UserSeeder::class
        ]);

        //Comment::factory(10)->validado()->create();
    }
}

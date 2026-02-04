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
        $superadmin = User::create([
            'name' => 'Luis Luna',
            'email' => 'eduarlun4@gmail.com',
            'password' => 'Hmcnjsa1*.',
            'type_user_id' => 1,
            'email_verified_at' => now(),

            'status' => 1
        ]);
        $superadmin->assignRole('super-admin');

        $admin = User::create([
            'name' => 'Josdaly Marin',
            'email' => 'contac@taxesmigra.com',
            'password' => 'taxesmigra123#',
            'type_user_id' => 1,
            'email_verified_at' => now(),
            'status' => 1
        ]);
        $admin->assignRole('admin');
    }
}

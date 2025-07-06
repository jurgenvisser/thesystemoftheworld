<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'jurgen@example.com'],
            [
                'name' => 'Jurgen Visser',
                'password' => bcrypt('Jurgenbv@2001'), // Veilig wachtwoord
            ]
        );

        User::firstOrCreate(
            ['email' => 'contact@thesystemoftheworld.com'],
            [
                'name' => 'Quinn Bholasingh',
                'password' => bcrypt('Charissa0607'), // Veilig wachtwoord
            ]
        );
    }
}

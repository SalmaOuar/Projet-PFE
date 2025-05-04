<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Alaoui',
            'prenom' => 'Ahmed',
            'email' => 'admin@pfens.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'nom' => 'Safi',
            'prenom' => 'Amal',
            'email' => 'etudiant@pfens.com',
            'password' => bcrypt('etudiant123'),
            'role' => 'etudiant',
        ]);

        User::create([
            'nom' => 'Sami',
            'prenom' => 'Saïd',
            'email' => 'encadrant@pfens.com',
            'password' => bcrypt('encadrant123'),
            'role' => 'encadrant',
        ]);
    
    }
}

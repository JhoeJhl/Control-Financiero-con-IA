<?php

namespace Database\Seeders;

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
        \App\Models\Category::create(['name' => 'Comida', 'type' => 'expense', 'color' => '#ef4444']);
        \App\Models\Category::create(['name' => 'Sueldo', 'type' => 'income', 'color' => '#10b981']);

        // Y crea un usuario de prueba con su cuenta
        $user = \App\Models\User::create([
            'name' => 'Usuario Prueba',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $user->accounts()->create([
            'name' => 'Efectivo',
            'balance' => 0,
            'currency' => 'USD'
        ]);
    }
}

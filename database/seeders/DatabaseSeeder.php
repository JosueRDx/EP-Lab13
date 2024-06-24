<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Importar la clase User
use App\Models\Libro; // Importar la clase Libro
use App\Models\Prestamo; // Importar la clase Prestamo

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios y libros primero
        $users = User::factory(0)->create();
        $libros = Libro::factory(10)->create();

        // Crear préstamos asignando usuarios y libros ya creados
        Prestamo::factory(0)->make()->each(function ($prestamo) use ($users, $libros) {
            $prestamo->usuario_id = $users->random()->id;
            $prestamo->libro_id = $libros->random()->id;
            $prestamo->save();
        });
    }
}

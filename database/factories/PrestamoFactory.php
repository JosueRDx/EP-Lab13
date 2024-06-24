<?php

namespace Database\Factories;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestamoFactory extends Factory
{
    protected $model = Prestamo::class;

    public function definition()
    {
        return [
            'libro_id' => Libro::factory(),
            'usuario_id' => User::factory(),
            'fecha_inicio' => $this->faker->date(),
            'fecha_devolucion' => null,
            'devuelto' => $this->faker->boolean(),
        ];
    }
}

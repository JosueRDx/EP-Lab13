<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    protected $model = Libro::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'autor' => $this->faker->name(),
            'editorial' => $this->faker->company(),
            'anio' => $this->faker->year(),
            'disponible' => $this->faker->boolean(),
        ];
    }
}

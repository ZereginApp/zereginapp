<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Cuadrilla;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Categoria> */
class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition(): array
    {
        return [
            'cuadrilla_id' => Cuadrilla::factory(),
            'nombre' => fake()->unique()->word(),
        ];
    }
}

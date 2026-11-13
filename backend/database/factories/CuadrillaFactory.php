<?php

namespace Database\Factories;

use App\Models\Cuadrilla;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Cuadrilla> */
class CuadrillaFactory extends Factory
{
    protected $model = Cuadrilla::class;
    public function definition(): array
    {
        return ['nombre' => fake()->unique()->words(2, true), 'descripcion' => fake()->sentence()];
    }
}

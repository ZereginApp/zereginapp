<?php

namespace Database\Factories;

use App\Models\TipoTarea;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoTareaFactory extends Factory
{
    protected $model = TipoTarea::class;
    public function definition(): array
    {
        return ['nombre' => fake()->unique()->word()];
    }
}

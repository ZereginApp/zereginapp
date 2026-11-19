<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Usuario> */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'Demo2027!',
            'rol' => 'miembro',
            'anio_ingreso' => fake()->numberBetween(2000, 2026),
            'fecha_baja' => null,
        ];
    }

    /** Asigna una categoría existente. */
    public function enCategoria(Categoria $categoria): static
    {
        return $this->state(fn() => ['categoria_id' => $categoria->id]);
    }

    public function administrador(): static
    {
        return $this->state(fn() => ['rol' => 'admin']);
    }

    public function deBaja(): static
    {
        return $this->state(fn() => ['fecha_baja' => now()]);
    }
}

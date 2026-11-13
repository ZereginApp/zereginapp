<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Cuadrilla;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Usuario> */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'cuadrilla_id' => Cuadrilla::factory(),
            'categoria_id' => Categoria::factory(),
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'Demo2027!',
            'rol' => 'miembro',
            'estado' => 'activo',
            'anio_ingreso' => fake()->numberBetween(2000, 2026),
            'fecha_baja' => null,
        ];
    }

    /** Asigna cuadrilla y categoría existentes para mantener la relación coherente. */
    public function enCuadrilla(Cuadrilla $cuadrilla, Categoria $categoria): static
    {
        return $this->state(fn() => [
            'cuadrilla_id' => $cuadrilla->id,
            'categoria_id' => $categoria->id,
        ]);
    }

    public function administrador(): static
    {
        return $this->state(fn() => ['rol' => 'admin']);
    }

    public function invitado(): static
    {
        return $this->state(fn() => ['estado' => 'invitado', 'password' => null]);
    }
}

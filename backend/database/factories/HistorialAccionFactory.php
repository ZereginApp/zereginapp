<?php

namespace Database\Factories;

use App\Models\HistorialAccion;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<HistorialAccion> */
class HistorialAccionFactory extends Factory
{
    protected $model = HistorialAccion::class;

    public function definition(): array
    {
        return [
            'admin_id' => Usuario::factory()->administrador(),
            'usuario_afectado_id' => Usuario::factory(),
            'tarea_id' => null,
            'tarea_destino_id' => null,
            'tipo_accion' => fake()->randomElement(['anadir', 'baja', 'mover']),
            'motivo' => fake()->sentence(),
            'created_at' => now(),
        ];
    }

    public function sobreTarea(Tarea $tarea): static
    {
        return $this->state(fn() => ['tarea_id' => $tarea->id]);
    }
}

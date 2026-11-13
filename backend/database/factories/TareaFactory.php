<?php

namespace Database\Factories;

use App\Models\Cuadrilla;
use App\Models\Tarea;
use App\Models\TipoTarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Tarea> */
class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition(): array
    {
        $inicio = fake()->dateTimeBetween('+2 days', '+20 days');
        $fin = (clone $inicio)->modify('+2 hours');

        return [
            'cuadrilla_id' => Cuadrilla::factory(),
            'tipo_tarea_id' => TipoTarea::factory(),
            'creador_id' => Usuario::factory(),
            'responsable_id' => null,
            'titulo' => fake()->sentence(4),
            'descripcion' => fake()->paragraph(),
            'inicio' => $inicio,
            'fin' => $fin,
            'punto_encuentro' => fake()->streetAddress(),
            'instrucciones' => fake()->sentence(),
            'plazas_minimas' => 2,
            'plazas_maximas' => 8,
            'estado' => 'borrador',
            'antiguedad_minima' => null,
            'limite_inscripcion' => (clone $inicio)->modify('-1 day'),
            'limite_cancelacion' => (clone $inicio)->modify('-2 hours'),
            'admite_lista_espera' => true,
        ];
    }

    /** Asigna relaciones existentes de una misma cuadrilla. */
    public function enCuadrilla(Cuadrilla $cuadrilla, TipoTarea $tipo, Usuario $creador): static
    {
        return $this->state(fn() => [
            'cuadrilla_id' => $cuadrilla->id,
            'tipo_tarea_id' => $tipo->id,
            'creador_id' => $creador->id,
        ]);
    }

    public function cruzandoMedianoche(): static
    {
        return $this->state(function () {
            $inicio = now()->addDays(3)->setTime(23, 0);
            return [
                'inicio' => $inicio,
                'fin' => $inicio->copy()->addHours(2),
                // Los límites deben recalcularse: si no, pueden quedar después del nuevo inicio
                // y MySQL rechaza la fila por chk_tareas_limite_inscripcion / chk_tareas_limite_cancelacion.
                'limite_inscripcion' => $inicio->copy()->subDay(),
                'limite_cancelacion' => $inicio->copy()->subHours(2),
            ];
        });
    }
}

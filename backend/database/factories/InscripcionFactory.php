<?php

namespace Database\Factories;

use App\Models\Inscripcion;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Inscripcion> */
class InscripcionFactory extends Factory
{
    protected $model = Inscripcion::class;

    public function definition(): array
    {
        return [
            'tarea_id' => Tarea::factory(),
            'usuario_id' => Usuario::factory(),
            'estado' => 'confirmada',
            'origen' => 'usuario',
            'creada_por_id' => null,
            'en_espera_desde' => null,
            'cancelada_at' => null,
        ];
    }

    public function para(Tarea $tarea, Usuario $usuario): static
    {
        return $this->state(fn() => ['tarea_id' => $tarea->id, 'usuario_id' => $usuario->id]);
    }

    public function creadaPorAdmin(Usuario $admin): static
    {
        return $this->state(fn() => ['origen' => 'admin', 'creada_por_id' => $admin->id]);
    }

    public function enEspera(): static
    {
        return $this->state(fn() => ['estado' => 'en_espera', 'en_espera_desde' => now()]);
    }

    public function cancelada(): static
    {
        return $this->state(fn() => ['estado' => 'cancelada', 'cancelada_at' => now()]);
    }
}

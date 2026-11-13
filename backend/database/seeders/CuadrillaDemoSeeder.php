<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cuadrilla;
use App\Models\Inscripcion;
use App\Models\Tarea;
use App\Models\TipoTarea;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CuadrillaDemoSeeder extends Seeder
{
    /**
     * Datos ficticios para desarrollo y demostración.
     * Las fechas se sitúan en las fiestas de La Blanca de 2027:
     * actos previos (1-3 de agosto) y programa principal (4-9 de agosto).
     */
    public function run(): void
    {
        $cuadrilla = Cuadrilla::firstOrCreate(
            ['nombre' => 'Cuadrilla Demo La Blanca'],
            ['descripcion' => 'Cuadrilla ficticia para desarrollo y demostración.']
        );

        $blusa = Categoria::firstOrCreate(['cuadrilla_id' => $cuadrilla->id, 'nombre' => 'Blusa']);
        $neska = Categoria::firstOrCreate(['cuadrilla_id' => $cuadrilla->id, 'nombre' => 'Neska']);

        $tipos = [];
        foreach (['Logística', 'Txaranga', 'Reparto', 'Acto benéfico', 'Comida'] as $nombre) {
            $tipos[$nombre] = TipoTarea::firstOrCreate(['nombre' => $nombre]);
        }

        $passwordDemo = Hash::make('Demo2027!');
        $administradores = [];
        $administradores[] = Usuario::updateOrCreate(
            ['email' => 'admin@cuadrilla.test'],
            [
                'cuadrilla_id' => $cuadrilla->id,
                'categoria_id' => $blusa->id,
                'nombre' => 'Marta',
                'apellidos' => 'Administración',
                'password' => $passwordDemo,
                'rol' => 'admin',
                'estado' => 'activo',
                'anio_ingreso' => 2012,
                'fecha_baja' => null
            ]
        );
        $administradores[] = Usuario::updateOrCreate(
            ['email' => 'admin2@cuadrilla.test'],
            [
                'cuadrilla_id' => $cuadrilla->id,
                'categoria_id' => $neska->id,
                'nombre' => 'Aitor',
                'apellidos' => 'Coordinación',
                'password' => $passwordDemo,
                'rol' => 'admin',
                'estado' => 'activo',
                'anio_ingreso' => 2009,
                'fecha_baja' => null
            ]
        );

        $datosMiembros = [
            ['Ane', 'García', 'Blusa', 2018],
            ['Iker', 'López', 'Neska', 2015],
            ['Nerea', 'Martín', 'Blusa', 2021],
            ['Unai', 'Pérez', 'Neska', 2010],
            ['Leire', 'Sánchez', 'Blusa', 2016],
            ['Mikel', 'Ruiz', 'Neska', 2007],
            ['June', 'Hernández', 'Blusa', 2023],
            ['Ander', 'Díaz', 'Neska', 2019],
            ['Maialen', 'Álvarez', 'Blusa', 2013],
            ['Gorka', 'Moreno', 'Neska', 2024],
            ['Irati', 'Muñoz', 'Blusa', 2005],
            ['Asier', 'Romero', 'Neska', 2017],
            ['Ainhoa', 'Alonso', 'Blusa', 2020],
            ['Eneko', 'Gutiérrez', 'Neska', 2011],
            ['Miren', 'Navarro', 'Blusa', 2008],
            ['Julen', 'Torres', 'Neska', 2022],
            ['Garazi', 'Domínguez', 'Blusa', 2014],
            ['Oier', 'Vázquez', 'Neska', 2006],
            ['Lara', 'Ramos', 'Blusa', 2025],
            ['Jon', 'Gil', 'Neska', 2012],
            ['Edurne', 'Serrano', 'Blusa', 2004],
            ['Xabier', 'Molina', 'Neska', 2026],
            ['Ariadna', 'Blanco', 'Blusa', 2019],
            ['Manu', 'Suárez', 'Neska', 2016],
            ['Naia', 'Castro', 'Blusa', 2003],
            ['Iñigo', 'Ortega', 'Neska', 2021],
            ['Uxue', 'Delgado', 'Blusa', 2017],
            ['Ruben', 'Marín', 'Neska', 2009],
            ['Alaia', 'Iglesias', 'Blusa', 2024],
            ['Danel', 'Santos', 'Neska', 2014],
        ];

        $miembros = [];
        foreach ($datosMiembros as $indice => [$nombre, $apellidos, $nombreCategoria, $anio]) {
            $email = sprintf('miembro%02d@cuadrilla.test', $indice + 1);
            $categoria = $nombreCategoria === 'Blusa' ? $blusa : $neska;
            $miembros[] = Usuario::updateOrCreate(
                ['email' => $email],
                [
                    'cuadrilla_id' => $cuadrilla->id,
                    'categoria_id' => $categoria->id,
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'password' => $passwordDemo,
                    'rol' => 'miembro',
                    'estado' => 'activo',
                    'anio_ingreso' => $anio,
                    'fecha_baja' => null
                ]
            );
        }

        // Fecha, hora de inicio, hora de fin, tipo, plazas máximas, categorías permitidas.
        // La tarea 8 comienza el 5 de agosto y termina el 6 de agosto, después de medianoche.
        $datosTareas = [
            ['2027-08-01', '09:00', '12:00', 'Logística', 8, ['Blusa', 'Neska'], 'Preparación del local', 'Ordenar y preparar el local de la cuadrilla.'],
            ['2027-08-01', '17:00', '20:00', 'Comida', 10, ['Blusa'], 'Preparación de pancarta', 'Preparar materiales y pancartas para los actos previos.'],
            ['2027-08-02', '10:00', '13:00', 'Reparto', 6, ['Neska'], 'Reparto de invitaciones', 'Repartir invitaciones y carteles por el barrio.'],
            ['2027-08-02', '18:00', '21:00', 'Txaranga', 12, ['Blusa', 'Neska'], 'Ensayo de txaranga', 'Ensayo general y revisión del recorrido.'],
            ['2027-08-03', '08:30', '11:30', 'Logística', 8, ['Blusa', 'Neska'], 'Montaje de materiales', 'Preparar y cargar el material necesario.'],
            ['2027-08-03', '16:00', '19:00', 'Acto benéfico', 10, ['Neska'], 'Preparación del acto solidario', 'Organizar mesas, materiales y turnos.'],
            ['2027-08-04', '07:00', '10:00', 'Logística', 10, ['Blusa', 'Neska'], 'Preparativos del día 4', 'Coordinar la salida y el material de la cuadrilla.'],
            ['2027-08-05', '22:30', '01:30', 'Txaranga', 8, ['Blusa', 'Neska'], 'Acompañamiento nocturno', 'Acompañar a la txaranga durante el recorrido nocturno.'],
            ['2027-08-04', '12:00', '15:00', 'Comida', 8, ['Blusa'], 'Comida de cuadrilla', 'Preparar y servir la comida.'],
            ['2027-08-05', '09:00', '12:00', 'Reparto', 6, ['Neska'], 'Punto de reparto', 'Atender el punto de reparto durante la mañana.'],
            ['2027-08-05', '17:00', '20:00', 'Logística', 8, ['Blusa', 'Neska'], 'Recogida de material', 'Recoger, clasificar y guardar el material.'],
            ['2027-08-06', '10:00', '13:00', 'Acto benéfico', 10, ['Blusa', 'Neska'], 'Colaboración solidaria', 'Apoyar la actividad solidaria del día.'],
            ['2027-08-06', '18:00', '21:00', 'Txaranga', 8, ['Blusa', 'Neska'], 'Pasacalles de tarde', 'Participar en la organización del pasacalles.'],
            ['2027-08-07', '08:00', '11:00', 'Reparto', 6, ['Blusa'], 'Desayuno popular', 'Preparar y repartir desayunos.'],
            ['2027-08-07', '14:00', '17:00', 'Comida', 8, ['Neska'], 'Comida popular', 'Dar apoyo en cocina y servicio.'],
            ['2027-08-08', '09:00', '12:00', 'Logística', 10, ['Blusa', 'Neska'], 'Organización de actividades', 'Preparar espacios y señalización.'],
            ['2027-08-08', '16:00', '19:00', 'Acto benéfico', 8, ['Blusa', 'Neska'], 'Puesto solidario', 'Atender el puesto y organizar los turnos.'],
            ['2027-08-09', '08:00', '11:00', 'Logística', 6, ['Blusa', 'Neska'], 'Desmontaje inicial', 'Retirar y almacenar parte de los materiales.'],
            ['2027-08-09', '12:00', '15:00', 'Comida', 8, ['Blusa', 'Neska'], 'Comida de cierre', 'Preparar la comida de cierre de fiestas.'],
            ['2027-08-09', '18:00', '21:00', 'Logística', 8, ['Blusa', 'Neska'], 'Limpieza y cierre del local', 'Dejar el local recogido y cerrar las actividades.'],
        ];

        $tareas = [];
        foreach ($datosTareas as $indice => [$fecha, $horaInicio, $horaFin, $tipo, $plazas, $categorias, $titulo, $descripcion]) {
            $inicio = Carbon::parse($fecha . ' ' . $horaInicio);
            $fin = Carbon::parse($fecha . ' ' . $horaFin);
            if ($fin->lessThanOrEqualTo($inicio)) {
                $fin->addDay();
            }

            $tarea = Tarea::updateOrCreate(
                ['cuadrilla_id' => $cuadrilla->id, 'titulo' => $titulo],
                [
                    'tipo_tarea_id' => $tipos[$tipo]->id,
                    'creador_id' => $administradores[$indice % 2]->id,
                    'responsable_id' => $miembros[$indice % count($miembros)]->id,
                    'descripcion' => $descripcion,
                    'inicio' => $inicio,
                    'fin' => $fin,
                    'punto_encuentro' => 'Local de la Cuadrilla Demo',
                    'instrucciones' => 'Llegar diez minutos antes y avisar al responsable al llegar.',
                    'plazas_minimas' => 2,
                    'plazas_maximas' => $plazas,
                    'estado' => 'publicada',
                    'antiguedad_minima' => $indice % 4 === 0 ? 2 : null,
                    'limite_inscripcion' => $inicio->copy()->subDay(),
                    'limite_cancelacion' => $inicio->copy()->subHours(3),
                    'admite_lista_espera' => true
                ]
            );

            $idsCategorias = array_map(
                fn(string $nombre) => $nombre === 'Blusa' ? $blusa->id : $neska->id,
                $categorias
            );
            $tarea->categoriasPermitidas()->sync($idsCategorias);
            $tareas[] = $tarea;
        }

        // Eliminar una tarea del seeder antiguo que ya no forma parte del conjunto de 20.
        // Solo se elimina este registro conocido de demostración y sus relaciones dependientes.
        $tareaAntigua = Tarea::where('cuadrilla_id', $cuadrilla->id)
            ->where('titulo', 'Apoyo al reparto de bebida')
            ->first();
        if ($tareaAntigua) {
            $tareaAntigua->inscripciones()->delete();
            $tareaAntigua->categoriasPermitidas()->detach();
            $tareaAntigua->delete();
        }

        // Vaciar solo las inscripciones de estas 20 tareas demo para que el seeder sea repetible.
        Inscripcion::whereIn('tarea_id', collect($tareas)->pluck('id'))->delete();

        // Una tarea queda completamente ocupada: 8 plazas y 8 inscripciones confirmadas.
        $tareaCompleta = $tareas[12];
        foreach (array_slice($miembros, 0, $tareaCompleta->plazas_maximas) as $miembro) {
            Inscripcion::create([
                'tarea_id' => $tareaCompleta->id,
                'usuario_id' => $miembro->id,
                'estado' => 'confirmada',
                'origen' => 'usuario',
            ]);
        }

        // Lista de espera: solo tiene sentido en una tarea sin plazas libres.
        foreach (array_slice($miembros, $tareaCompleta->plazas_maximas, 2) as $posicion => $miembro) {
            Inscripcion::create([
                'tarea_id' => $tareaCompleta->id,
                'usuario_id' => $miembro->id,
                'estado' => 'en_espera',
                'origen' => 'usuario',
                'en_espera_desde' => now()->addMinutes($posicion), // orden de llegada a la lista
            ]);
        }

        // El resto de tareas recibe inscripciones de ejemplo coherentes con las categorías permitidas.
        foreach ($tareas as $indice => $tarea) {
            if ($indice === 12) {
                continue;
            }

            $categoriasPermitidas = $tarea->categoriasPermitidas()->pluck('categorias.id')->all();
            $candidatos = collect($miembros)->filter(fn(Usuario $miembro) => in_array($miembro->categoria_id, $categoriasPermitidas, true))->values();
            $cantidad = min(3 + ($indice % 2), $candidatos->count(), $tarea->plazas_maximas - 1);

            foreach ($candidatos->take($cantidad) as $posicion => $miembro) {
                Inscripcion::create([
                    'tarea_id' => $tarea->id,
                    'usuario_id' => $miembro->id,
                    'estado' => 'confirmada',
                    'origen' => $posicion === 0 && $indice % 5 === 0 ? 'admin' : 'usuario',
                    'creada_por_id' => $posicion === 0 && $indice % 5 === 0 ? $administradores[0]->id : null,
                ]);
            }
        }
    }
}

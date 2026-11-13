<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $fillable = ['cuadrilla_id', 'tipo_tarea_id', 'creador_id', 'responsable_id', 'titulo', 'descripcion', 'inicio', 'fin', 'punto_encuentro', 'instrucciones', 'plazas_minimas', 'plazas_maximas', 'estado', 'antiguedad_minima', 'limite_inscripcion', 'limite_cancelacion', 'admite_lista_espera'];
    protected function casts(): array
    {
        return ['inicio' => 'datetime', 'fin' => 'datetime', 'limite_inscripcion' => 'datetime', 'limite_cancelacion' => 'datetime', 'admite_lista_espera' => 'boolean', 'plazas_minimas' => 'integer', 'plazas_maximas' => 'integer', 'antiguedad_minima' => 'integer'];
    }
    public function cuadrilla(): BelongsTo
    {
        return $this->belongsTo(Cuadrilla::class);
    }
    public function tipoTarea(): BelongsTo
    {
        return $this->belongsTo(TipoTarea::class);
    }
    public function creador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'creador_id');
    }
    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'responsable_id');
    }
    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class);
    }
    public function categoriasPermitidas(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_tarea');
    }
    public function historialOrigen(): HasMany
    {
        return $this->hasMany(HistorialAccion::class, 'tarea_id');
    }
    public function historialDestino(): HasMany
    {
        return $this->hasMany(HistorialAccion::class, 'tarea_destino_id');
    }
}

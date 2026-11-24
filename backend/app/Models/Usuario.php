<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = ['categoria_id', 'nombre', 'apellidos', 'email', 'password', 'rol', 'anio_ingreso', 'fecha_baja'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed', 'anio_ingreso' => 'integer', 'fecha_baja' => 'datetime'];
    }

    /** Activo si no tiene fecha de baja. */
    public function estaActivo(): bool
    {
        return $this->fecha_baja === null;
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function inscripciones(): HasMany
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function tareasCreadas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'creador_id');
    }

    public function tareasResponsable(): HasMany
    {
        return $this->hasMany(Tarea::class, 'responsable_id');
    }

    public function tareasInscritas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'inscripciones')->withPivot(['id', 'estado', 'origen', 'creada_por_id', 'en_espera_desde', 'cancelada_at'])->withTimestamps();
    }

    public function inscripcionesCreadasComoAdmin(): HasMany
    {
        return $this->hasMany(Inscripcion::class, 'creada_por_id');
    }

    public function accionesComoAdmin(): HasMany
    {
        return $this->hasMany(HistorialAccion::class, 'admin_id');
    }

    public function accionesQueLeAfectan(): HasMany
    {
        return $this->hasMany(HistorialAccion::class, 'usuario_afectado_id');
    }
}

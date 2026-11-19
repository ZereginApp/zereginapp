<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistorialAccion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'historial_acciones';
    protected $fillable = ['admin_id', 'usuario_afectado_id', 'tarea_id', 'tarea_destino_id', 'tipo_accion', 'motivo', 'created_at'];
    protected function casts(): array
    {
        return ['created_at' => 'datetime'];
    }
    public function administrador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'admin_id');
    }
    public function usuarioAfectado(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_afectado_id');
    }
    public function tareaOrigen(): BelongsTo
    {
        return $this->belongsTo(Tarea::class, 'tarea_id');
    }
    public function tareaDestino(): BelongsTo
    {
        return $this->belongsTo(Tarea::class, 'tarea_destino_id');
    }
}

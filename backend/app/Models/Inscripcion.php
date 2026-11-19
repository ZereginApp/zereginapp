<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripciones';
    protected $fillable = ['tarea_id', 'usuario_id', 'estado', 'origen', 'creada_por_id', 'en_espera_desde', 'cancelada_at'];
    protected function casts(): array
    {
        return ['en_espera_desde' => 'datetime', 'cancelada_at' => 'datetime'];
    }
    public function tarea(): BelongsTo
    {
        return $this->belongsTo(Tarea::class);
    }
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
    public function creadaPor(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'creada_por_id');
    }
}

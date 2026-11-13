<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categorias';
    protected $fillable = ['cuadrilla_id', 'nombre'];
    public function cuadrilla(): BelongsTo
    {
        return $this->belongsTo(Cuadrilla::class);
    }
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class);
    }
    public function tareas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'categoria_tarea');
    }
}

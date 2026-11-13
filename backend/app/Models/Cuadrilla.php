<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuadrilla extends Model
{
    use HasFactory;
    protected $table = 'cuadrillas';
    protected $fillable = ['nombre', 'descripcion'];
    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class);
    }
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class);
    }
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class);
    }
}

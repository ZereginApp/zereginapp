<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoTarea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tipos_tarea';
    protected $fillable = ['nombre'];
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class);
    }
}

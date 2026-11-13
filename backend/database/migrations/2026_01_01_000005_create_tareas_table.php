<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuadrilla_id')->constrained('cuadrillas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('tipo_tarea_id')->constrained('tipos_tarea')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('creador_id')->constrained('usuarios')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('responsable_id')->nullable()->constrained('usuarios')->cascadeOnUpdate()->nullOnDelete();
            $table->string('titulo', 180);
            $table->text('descripcion');
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->string('punto_encuentro', 255);
            $table->text('instrucciones');
            $table->unsignedInteger('plazas_minimas');
            $table->unsignedInteger('plazas_maximas');
            $table->string('estado', 20)->default('borrador');
            $table->unsignedInteger('antiguedad_minima')->nullable();
            $table->dateTime('limite_inscripcion');
            $table->dateTime('limite_cancelacion');
            $table->boolean('admite_lista_espera')->default(false);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->index(['cuadrilla_id', 'estado', 'inicio']);
            // Índices propios de las fechas: búsquedas por rango y detección de solapamientos.
            $table->index(['inicio', 'fin'], 'idx_tareas_inicio_fin');
            $table->index('fin', 'idx_tareas_fin');
        });
        DB::statement('ALTER TABLE tareas ADD CONSTRAINT chk_tareas_fechas CHECK (fin > inicio)');
        DB::statement('ALTER TABLE tareas ADD CONSTRAINT chk_tareas_plazas CHECK (plazas_maximas >= plazas_minimas)');
        DB::statement("ALTER TABLE tareas ADD CONSTRAINT chk_tareas_estado CHECK (estado IN ('borrador', 'publicada', 'cancelada'))");
        DB::statement('ALTER TABLE tareas ADD CONSTRAINT chk_tareas_limite_inscripcion CHECK (limite_inscripcion <= inicio)');
        DB::statement('ALTER TABLE tareas ADD CONSTRAINT chk_tareas_limite_cancelacion CHECK (limite_cancelacion <= inicio)');
    }
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};

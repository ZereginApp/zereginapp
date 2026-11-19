<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->constrained('tareas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('estado', 20);
            $table->string('origen', 10)->default('usuario');
            $table->foreignId('creada_por_id')->nullable()->constrained('usuarios')->cascadeOnUpdate()->nullOnDelete();
            $table->dateTime('en_espera_desde')->nullable();
            $table->dateTime('cancelada_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->unique(['tarea_id', 'usuario_id']);
            $table->index(['tarea_id', 'estado', 'en_espera_desde']);
        });
        DB::statement("ALTER TABLE inscripciones ADD CONSTRAINT chk_inscripciones_estado CHECK (estado IN ('confirmada', 'en_espera', 'cancelada'))");
        DB::statement("ALTER TABLE inscripciones ADD CONSTRAINT chk_inscripciones_origen CHECK (origen IN ('usuario', 'admin'))");
        DB::statement("ALTER TABLE inscripciones ADD CONSTRAINT chk_inscripciones_espera CHECK ((estado = 'en_espera' AND en_espera_desde IS NOT NULL) OR (estado <> 'en_espera' AND en_espera_desde IS NULL))");
    }
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuadrilla_id')->constrained('cuadrillas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nombre', 100);
            $table->string('apellidos', 150);
            $table->string('email', 190)->unique();
            $table->string('password')->nullable();
            $table->string('rol', 20)->default('miembro');
            $table->string('estado', 20)->default('invitado');
            $table->year('anio_ingreso');
            $table->dateTime('fecha_baja')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->index(['cuadrilla_id', 'categoria_id']);
        });
        DB::statement("ALTER TABLE usuarios ADD CONSTRAINT chk_usuarios_rol CHECK (rol IN ('admin', 'miembro'))");
        DB::statement("ALTER TABLE usuarios ADD CONSTRAINT chk_usuarios_estado CHECK (estado IN ('invitado', 'activo', 'baja'))");
    }
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

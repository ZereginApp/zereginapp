<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historial_acciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('usuarios')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('usuario_afectado_id')->constrained('usuarios')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('tarea_id')->nullable()->constrained('tareas')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('tarea_destino_id')->nullable()->constrained('tareas')->cascadeOnUpdate()->nullOnDelete();
            $table->string('tipo_accion', 50);
            $table->text('motivo');
            $table->dateTime('created_at')->useCurrent();
            $table->index(['admin_id', 'created_at']);
            $table->index(['usuario_afectado_id', 'created_at']);
            $table->index(['tarea_id', 'created_at']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('historial_acciones');
    }
};

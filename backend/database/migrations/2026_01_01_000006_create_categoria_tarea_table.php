<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categoria_tarea', function (Blueprint $table) {
            $table->foreignId('tarea_id')->constrained('tareas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnUpdate()->restrictOnDelete();
            $table->primary(['tarea_id', 'categoria_id']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('categoria_tarea');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique()->comment('Nome da categoria');
            $table->string('descricao', 255)->nullable()->comment('Descrição da categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_categoria');
    }
};

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
        Schema::create('simulacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contato_id')->constrained('contatos'); 
            $table->foreignId('consulta_id')->constrained('credito_imob_consulta');
            $table->boolean('subsidio');
            $table->float('valor_imovel')->nullable();
            $table->float('valor_entrada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulacoes');
    }
};

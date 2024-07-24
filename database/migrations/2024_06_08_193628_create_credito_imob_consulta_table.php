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
        Schema::create('credito_imob_consulta', function (Blueprint $table) {
            $table->id();
            $table->decimal('renda', 10, 2);
            $table->float('juros', 5, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('parcela', 10, 2);
            $table->decimal('sub_com', 10, 2);
            $table->decimal('sub_sem', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credito_imob_consulta');
    }
};

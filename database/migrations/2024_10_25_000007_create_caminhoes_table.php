<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caminhoes', function (Blueprint $table) {
            $table->id();
            $table->char('placa', 8)->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('modelo_id');
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');

            $table->unsignedBigInteger('motorista_id');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caminhoes');
    }
};

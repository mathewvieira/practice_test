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
        Schema::create('motorista_transportadora', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('motorista_id');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');

            $table->unsignedBigInteger('transportadora_id');
            $table->foreign('transportadora_id')->references('id')->on('transportadoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorista_transportadora');
    }
};

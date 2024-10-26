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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->char('cpf', 11)->unique();
            $table->dateTime('data_nascimento');
            $table->string('email', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('transportadora_id')->nullable();
            $table->foreign('transportadora_id')->references('id')->on('transportadoras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motoristas');
    }
};

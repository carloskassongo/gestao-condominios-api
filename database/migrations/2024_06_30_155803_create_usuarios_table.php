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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique()->nullable();
            $table->string('password', 100)->nullable();
            $table->boolean('ativo')->nullable();
            $table->string('nome', 50)->nullable();
            $table->string('sobrenome', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->unsignedBigInteger('idCondominio')->nullable();
            $table->timestamps();

            $table->foreign('idCondominio')
                  ->references('idCondominio')
                  ->on('condominios')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

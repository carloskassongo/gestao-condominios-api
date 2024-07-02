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
        Schema::create('pessoasfisicas', function (Blueprint $table) {
            $table->unsignedBigInteger('idPessoa')->primary();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 30)->nullable();

            $table->foreign('idPessoa')
                  ->references('idPessoa')
                  ->on('pessoas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoasfisicas');
    }
};

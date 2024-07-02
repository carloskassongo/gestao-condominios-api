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
        Schema::create('pessoa_moradia', function (Blueprint $table) {
            $table->unsignedBigInteger('idPessoa');
            $table->unsignedBigInteger('idMoradia');
            $table->primary(['idPessoa', 'idMoradia']);

            $table->foreign('idPessoa')
                  ->references('idPessoa')
                  ->on('pessoas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idMoradia')
                  ->references('idMoradia')
                  ->on('moradias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_moradia');
    }
};

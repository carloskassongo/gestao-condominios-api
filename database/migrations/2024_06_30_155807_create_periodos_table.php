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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id('idPeriodo');
            $table->date('dataInicio')->nullable();
            $table->date('dataFim')->nullable();
            $table->boolean('orcamentoFechado')->nullable();
            $table->unsignedBigInteger('idCondominio');
            $table->timestamps();

            $table->foreign('idCondominio')
                  ->references('idCondominio')
                  ->on('condominios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};

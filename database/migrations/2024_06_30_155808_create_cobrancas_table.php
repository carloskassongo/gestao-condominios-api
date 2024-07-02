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
        Schema::create('cobrancas', function (Blueprint $table) {
            $table->id('idCobranca');
            $table->unsignedBigInteger('idMoradia');
            $table->unsignedBigInteger('idPeriodo');
            $table->decimal('valor', 10, 2)->nullable();
            $table->boolean('paga')->nullable();
            $table->timestamps();

            $table->foreign('idMoradia')
                  ->references('idMoradia')
                  ->on('moradias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idPeriodo')
                  ->references('idPeriodo')
                  ->on('periodos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobrancas');
    }
};

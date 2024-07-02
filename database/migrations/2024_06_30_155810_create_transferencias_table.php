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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id('idTransferencia');
            $table->unsignedBigInteger('idContaOrigem');
            $table->unsignedBigInteger('idContaDestino');
            $table->unsignedBigInteger('idCondominio');
            $table->decimal('valor', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('idContaOrigem')
                  ->references('idConta')
                  ->on('contas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idContaDestino')
                  ->references('idConta')
                  ->on('contas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('transferencias');
    }
};

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
        Schema::create('contasbancarias', function (Blueprint $table) {
            $table->id('idContaBancaria');
            $table->unsignedBigInteger('idCondominio');
            $table->string('descricao', 100)->nullable();
            $table->string('agencia', 10)->nullable();
            $table->string('conta', 20)->nullable();
            $table->string('banco', 50)->nullable();
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
        Schema::dropIfExists('contasbancarias');
    }
};

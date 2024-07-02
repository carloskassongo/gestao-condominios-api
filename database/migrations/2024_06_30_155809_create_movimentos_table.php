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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id('idMovimento');
            $table->unsignedBigInteger('idConta');
            $table->unsignedBigInteger('idContaBancaria');
            $table->unsignedBigInteger('idCondominio');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idSubcategoria')->nullable();
            $table->unsignedBigInteger('idPeriodo');
            $table->date('dataMovimento')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->timestamps();

            $table->foreign('idConta')
                  ->references('idConta')
                  ->on('contas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idContaBancaria')
                  ->references('idContaBancaria')
                  ->on('contasbancarias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idCondominio')
                  ->references('idCondominio')
                  ->on('condominios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idCategoria')
                  ->references('idCategoria')
                  ->on('categorias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('idSubcategoria')
                  ->references('idSubcategoria')
                  ->on('subcategorias')
                  ->onDelete('set null')
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
        Schema::dropIfExists('movimentos');
    }
};

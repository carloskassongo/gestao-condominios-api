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
        Schema::create('condominios', function (Blueprint $table) {
            $table->id('idCondominio');
            $table->string('razaoSocial', 100)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('ie', 14)->nullable();
            $table->string('im', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefone', 10)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('numeroEnd', 6)->nullable();
            $table->string('complementoEnd', 30)->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('cidade', 30)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cep', 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condominios');
    }
};

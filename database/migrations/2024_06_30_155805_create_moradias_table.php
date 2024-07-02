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
        Schema::create('moradias', function (Blueprint $table) {
            $table->id('idMoradia');
            $table->string('descricao', 100)->nullable();
            $table->unsignedBigInteger('idBloco');
            $table->timestamps();

            $table->foreign('idBloco')
                  ->references('idBloco')
                  ->on('blocos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moradias');
    }
};

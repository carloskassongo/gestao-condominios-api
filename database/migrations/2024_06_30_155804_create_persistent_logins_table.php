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
        Schema::create('persistent_logins', function (Blueprint $table) {
            $table->string('series', 64)->primary();
            $table->string('username', 50)->nullable();
            $table->string('token', 64)->nullable();
            $table->timestamp('last_used')->nullable();

            $table->foreign('username')
                  ->references('username')
                  ->on('usuarios')
                  ->onDelete('cascade')
                  ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persistent_logins');
    }
};

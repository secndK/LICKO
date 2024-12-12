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
        Schema::create('composant', function (Blueprint $table) {
            $table->integer('code_composant')->primary();
            $table->string('designation_composant');
            $table->string('nom_composant');
            $table->string('num_serie')->index('fk_num_serie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composant');
    }
};

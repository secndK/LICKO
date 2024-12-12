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
        Schema::table('composant', function (Blueprint $table) {
            $table->foreign(['num_serie'], 'fk_num_serie')->references(['num_serie'])->on('equipement')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('composant', function (Blueprint $table) {
            $table->dropForeign('fk_num_serie');
        });
    }
};
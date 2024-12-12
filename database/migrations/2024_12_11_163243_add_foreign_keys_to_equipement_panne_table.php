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
        Schema::table('equipement_panne', function (Blueprint $table) {
            $table->foreign(['num_serie'], 'equipement_panne_ibfk_1')->references(['num_serie'])->on('equipement')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['code_panne'], 'equipement_panne_ibfk_2')->references(['code_panne'])->on('panne')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipement_panne', function (Blueprint $table) {
            $table->dropForeign('equipement_panne_ibfk_1');
            $table->dropForeign('equipement_panne_ibfk_2');
        });
    }
};

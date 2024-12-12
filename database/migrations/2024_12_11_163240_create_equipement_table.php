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
        Schema::create('equipement', function (Blueprint $table) {
            $table->string('num_serie')->primary();
            $table->string('designation_equipement');
            $table->string('nom_equipement');
            $table->string('type_equipement');
            $table->string('etat_equipement');
            $table->date('date_acq');
            $table->string('site') ;
            $table->string('matricule')->index('fk_matricule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipement');
    }
};

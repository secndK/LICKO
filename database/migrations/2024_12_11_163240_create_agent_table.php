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
        Schema::create('agent', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->string('nom_prenom')  ;
            $table->string('mot_de_passe')  ;
            $table->string('localisation_agent')  ;
            $table->integer('code_role')->index('code_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};

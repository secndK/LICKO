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
        Schema::table('agent_panne', function (Blueprint $table) {
            $table->foreign(['code_panne'], 'agent_panne_ibfk_1')->references(['code_panne'])->on('panne')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['matricule'], 'agent_panne_ibfk_2')->references(['matricule'])->on('agent')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_panne', function (Blueprint $table) {
            $table->dropForeign('agent_panne_ibfk_1');
            $table->dropForeign('agent_panne_ibfk_2');
        });
    }
};

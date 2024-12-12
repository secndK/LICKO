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
        Schema::table('agent_role', function (Blueprint $table) {
            $table->foreign(['code_role'], 'agent_role_ibfk_1')->references(['code_role'])->on('role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['matricule'], 'agent_role_ibfk_2')->references(['matricule'])->on('agent')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_role', function (Blueprint $table) {
            $table->dropForeign('agent_role_ibfk_1');
            $table->dropForeign('agent_role_ibfk_2');
        });
    }
};

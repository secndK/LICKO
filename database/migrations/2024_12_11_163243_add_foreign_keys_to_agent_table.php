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
        Schema::table('agent', function (Blueprint $table) {
            $table->foreign(['code_role'], 'fk_code_role')->references(['code_role'])->on('role')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent', function (Blueprint $table) {
            $table->dropForeign('fk_code_role');
        });
    }
};

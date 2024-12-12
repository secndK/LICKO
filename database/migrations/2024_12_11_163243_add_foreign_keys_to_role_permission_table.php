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
        Schema::table('role_permission', function (Blueprint $table) {
            $table->foreign(['code_role'], 'role_permission_ibfk_1')->references(['code_role'])->on('role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['code_permission'], 'role_permission_ibfk_2')->references(['code_permission'])->on('permission')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_permission', function (Blueprint $table) {
            $table->dropForeign('role_permission_ibfk_1');
            $table->dropForeign('role_permission_ibfk_2');
        });
    }
};

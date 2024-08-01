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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->enum('chuc_vu',['admin','user'])->default('user');
            $table->string('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('chuc_vu');
            $table->dropColumn('so_dien_thoai');
            $table->dropColumn('dia_chi');
        });
    }
};

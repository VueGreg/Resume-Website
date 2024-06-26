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
        Schema::table('technologies', function (Blueprint $table) {
            $table->foreign('id_category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            if (Schema::hasColumn('technologies', 'id_category')) {
                $table->dropForeign(['id_category']);
                $table->dropColumn('id_category');
            }
        });
    }
};

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
        Schema::table('experiences', function (Blueprint $table) {
            $table->unsignedBigInteger('id_project')->nullable()->before('created_at');
            $table->foreign('id_project')->references('id')->on('projects');

            $table->unsignedBigInteger('id_business')->nullable()->before('created_at');
            $table->foreign('id_business')->references('id')->on('businesses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            
            if (Schema::hasColumn('experiences', 'id_project')) {
                $table->dropForeign(['id_project']);
                $table->dropColumn('id_project');
            }
    
            if (Schema::hasColumn('experiences', 'id_business')) {
                $table->dropForeign(['id_business']);
                $table->dropColumn('id_business');
            }
        });
    }
};

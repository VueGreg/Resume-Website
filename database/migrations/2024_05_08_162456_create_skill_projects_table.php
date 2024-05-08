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
        Schema::create('skill_projects', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('id_project')->nullable()->before('created_at');
            $table->foreign('id_project')->references('id')->on('projects');

            $table->unsignedBigInteger('id_skill')->nullable()->before('created_at');
            $table->foreign('id_skill')->references('id')->on('skills');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_projects');
    }
};

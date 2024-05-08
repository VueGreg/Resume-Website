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
        Schema::create('technology_projects', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('id_project')->nullable()->before('created_at');
            $table->foreign('id_project')->references('id')->on('projects');

            $table->unsignedBigInteger('id_technology')->nullable()->before('created_at');
            $table->foreign('id_technology')->references('id')->on('technologies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technology_projects');
    }
};

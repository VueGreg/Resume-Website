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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('adress');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('description')->nullable();
            $table->boolean('driving_license');
            $table->boolean('vehicle');
            $table->string('password')->unique();
            $table->string('tokenAPI')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};

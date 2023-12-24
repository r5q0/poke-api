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
        Schema::create('berrys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('spicy');
            $table->integer('dry');
            $table->integer('sweet');
            $table->integer('bitter');
            $table->integer('sour');
            $table->integer('power')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('berrys');
    }
};

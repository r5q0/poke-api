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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->uni;
            $table->string('type1');
            $table->string('type2')->nullable();
            $table->string('jname');
            $table->integer('generation');
            $table->boolean('is_legendary')->default(0);
            $table->text('image')->nullable();
            $table->text('abilities');
            $table->text('color');
            $table->text('habitat')->nullable();
            $table->text('classification');
            $table->text('egg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};

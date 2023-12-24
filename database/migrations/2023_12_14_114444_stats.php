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
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('bug');
            $table->float('dark');
            $table->float('dragon');
            $table->float('electric');
            $table->float('fairy');
            $table->float('fight');
            $table->float('fire');
            $table->float('flying');
            $table->float('ghost');
            $table->float('grass');
            $table->float('ground');
            $table->float('ice');
            $table->float('normal');
            $table->float('posion');
            $table->float('psychic');
            $table->float('rock');
            $table->float('steel');
            $table->float('water');
            $table->float('attack');
            $table->float('defense');
            $table->float('hp');
            $table->float('speed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::dropIfExists('stats');
    }
};

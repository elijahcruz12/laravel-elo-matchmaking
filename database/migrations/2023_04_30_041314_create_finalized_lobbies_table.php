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
        Schema::create('finalized_lobbies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_one');
            $table->unsignedBigInteger('player_two');
            $table->unsignedInteger('player_one_elo');
            $table->unsignedInteger('player_two_elo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finalized_lobbies');
    }
};

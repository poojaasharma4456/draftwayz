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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->integer('player_id')->nullable();
            $table->integer('player_team_id')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('position')->nullable();
            $table->enum('injured', ['0', '1'])->comment('0 means not injured and 1 means injured.')->nullable();
            $table->string('team_logo')->nullable();
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

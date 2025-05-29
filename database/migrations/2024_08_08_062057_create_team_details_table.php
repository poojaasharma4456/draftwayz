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
        Schema::create('team_details', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id')->nullable();
            $table->integer('player_team_id')->nullable();
            $table->string('player_pos')->nullable();
            $table->string('player_name')->nullable();
            $table->string('player_team_name')->nullable();
            $table->string('player_team_logo')->nullable();
            $table->enum('is_captain',['0','1'])->default('0')->comment('0 for no 1 for yes');
            $table->enum('is_vice_captain',['0','1'])->default('0')->comment('0 for no 1 for yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_details');
    }
};

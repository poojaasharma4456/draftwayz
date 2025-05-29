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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league_id')->nullable();
            $table->integer('fixture_id')->nullable();

            $table->string('venue_name')->nullable();
            $table->string('venue_city')->nullable();

            $table->string('long_status')->nullable();
            $table->string('short_status')->nullable();

            $table->string('home_team_id')->nullable();
            $table->string('home_team_name')->nullable();
            $table->string('home_team_logo')->nullable();

            $table->string('away_team_id')->nullable();
            $table->string('away_team_name')->nullable();
            $table->string('away_team_logo')->nullable();

            $table->string('fixture_date')->nullable();
          
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};

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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->integer('league_id')->nullable();

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('logo')->nullable();

            $table->string('country_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_flag')->nullable();

            $table->string('year')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};

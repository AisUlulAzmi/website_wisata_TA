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
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('video_youtube')->nullable();
        });

        Schema::table('foods', function (Blueprint $table) {
            $table->string('video_youtube')->nullable();
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->string('video_youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('several_tables', function (Blueprint $table) {
            //
        });
    }
};

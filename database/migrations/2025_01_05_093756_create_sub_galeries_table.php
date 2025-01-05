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
        Schema::create('sub_galeries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('galery_id')->unsigned();
            $table->foreign('galery_id')->references('id')->on('galeries')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::table('galeries', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_galeries');
    }
};

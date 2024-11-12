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
        Schema::create('plant_categories', function (Blueprint $table) {
            $table->id();
            $table->string('pc_name');
            $table->integer('pc_ideal_moisture');
            $table->integer('pc_wilting_point');
            $table->longText('pc_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_categories');
    }
};

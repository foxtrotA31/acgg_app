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
        Schema::create('sensors', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->foreignId('plant_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('sensor_type');
            $table->integer('ping_status')->nullable();
            $table->integer('action_status')->nullable();
            $table->timestamp('ping_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};

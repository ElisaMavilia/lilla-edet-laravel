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
        Schema::create('dentist_treatment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dentist_id')->nullable();
            $table->unsignedBigInteger('treatment_id')->nullable();
            $table->foreign('dentist_id')->references('id')->on('dentists')->onDelete('cascade');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentist_treatment');
    }
};

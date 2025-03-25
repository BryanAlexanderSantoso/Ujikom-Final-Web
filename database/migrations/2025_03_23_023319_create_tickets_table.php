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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('concert_id');
            $table->unsignedBigInteger('cat_id');
            $table->integer('quantity');
            $table->string('date');
            $table->timestamps();

            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('cat_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

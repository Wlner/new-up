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
        Schema::create('deceases', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->unsignedBigInteger('block_id')->nullable();
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->foreign('lot_id')->references('id')->on('lots');
            $table->string('born_date');
            $table->string('died_on');
            $table->string('date_burial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceases');
    }
};

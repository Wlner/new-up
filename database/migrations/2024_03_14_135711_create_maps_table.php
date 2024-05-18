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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade');
            $table->string('plot_number');
            $table->string('occupant_name');
            $table->integer('occupant_age');
            $table->date('occupant_date_of_birth');
            $table->date('occupant_date_of_death');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};

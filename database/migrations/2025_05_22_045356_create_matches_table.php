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
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('tournaments_id');
            $table->foreign('tournaments_id')->references('id')->on('tournaments');
            $table->string('rival');
            $table->enum('best_of',['BO1', 'BO3', 'BO5']);
            $table->enum('result',['Victoria','Derrota','Empate','Pendiente'])->default('Pendiente');
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

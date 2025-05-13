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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->default(1);
            $table->string('name');
            $table->string('surname1');
            $table->string('surname2')->nullable();
            $table->string('nickname');
            $table->longText('image');
            $table->unsignedBigInteger('team_id');
            $table->timestamps();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

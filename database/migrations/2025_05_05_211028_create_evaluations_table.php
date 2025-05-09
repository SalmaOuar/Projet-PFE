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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sujet_id');
            $table->unsignedBigInteger('encadrant_id');
            $table->double('note');
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->foreign('sujet_id')->references('id')->on('sujet_p_f_e_s')->onDelete('cascade');
            $table->foreign('encadrant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

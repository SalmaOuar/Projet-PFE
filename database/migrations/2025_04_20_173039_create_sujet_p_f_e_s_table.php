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
        Schema::create('sujet_p_f_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->enum('statut', ['en attente', 'validé', 'refusé'])->default('en attente');
            $table->string('anneeUniversitaire');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // étudiant qui soumet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujet_p_f_e_s');
    }
};

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
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('player_card_id')->constrained('cartas')->onDelete('cascade'); // ID de la carta del jugador
            $table->integer('ronda')->default(1);
            $table->integer('turno')->default(1);
            $table->integer('energiaMax')->default(3); // Consistencia con el controlador
            $table->integer('energia')->default(3);
            $table->json('enemigos')->nullable(); // IDs de cartas enemigos
            $table->json('objetos')->nullable(); // IDs de cartas objetos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidas');
    }
};

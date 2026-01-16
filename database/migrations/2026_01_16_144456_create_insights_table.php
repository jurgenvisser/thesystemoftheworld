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
        Schema::create('insights', function (Blueprint $table) {
            $table->id();

            // Mens-leesbare identificatie (voor URLs)
            $table->string('slug')->unique(); // bijv: inzicht-1

            // Titel voor overzichten / admin
            $table->string('title');

            // Publicatie-status
            $table->boolean('published')->default(false);

            // De volledige inhoud van het inzicht (jouw JSON)
            $table->json('content');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insights');
    }
};

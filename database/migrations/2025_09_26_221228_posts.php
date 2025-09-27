<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Korrigiert
            $table->string('title');
            $table->string('slug')->unique(); // Slug sollte unique sein
            $table->text('body');
            $table->string('image')->nullable(); // Image optional machen
            $table->boolean('published')->default(false);
            $table->integer('likes')->default(0); // Likes-Spalte hinzugefügt
            $table->timestamps();

            $table->index('published'); // Sinnvoller Index
            $table->index('likes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts'); // Schema groß geschrieben
    }
};

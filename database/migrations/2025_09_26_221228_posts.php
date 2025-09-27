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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->id('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('image');
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->index('likes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('posts');
    }
};

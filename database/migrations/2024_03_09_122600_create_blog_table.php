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
        Schema::create('blog', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('author_id')->index();
            $table->foreignUlid('category_id')->index();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->longText('content')->nullable();
            $table->date('publish')->nullable();
            $table->json('tags')->nullable();
            $table->boolean('visible')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};

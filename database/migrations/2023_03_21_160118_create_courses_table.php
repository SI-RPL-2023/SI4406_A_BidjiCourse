<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->boolean('draft');
            // $table->enum('status', ['Published', 'Draft'])->default('Published');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->longText('desc');
            $table->longText('body');
            // $table->tinyInteger('rating')->nullable()->check('rating >= 1 and rating <= 5');
            $table->unsignedTinyInteger('rating')->nullable()->min(1)->max(5);
            $table->integer('rating_total')->nullable();
            $table->string('added_by');
            $table->string('last_edited_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->boolean('draft');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->longText('desc');
            $table->longText('body');
            $table->tinyInteger('rating')->nullable()->check('rating >= 1 and rating <= 5');
            $table->tinyInteger('rating_total')->nullable();
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

<?php

use Illuminate\Support\Facades\DB;
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
            $table->boolean('draft');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('category_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('cover');
            $table->longText('desc');
            $table->longText('body');
            // $table->tinyInteger('rating')->nullable()->check('rating >= 1 and rating <= 5');
            $table->unsignedTinyInteger('rating')->nullable()->unsigned()->min(1)->max(5);
            $table->integer('rating_total')->nullable();
            $table->string('last_edited_by');
            $table->timestamps();
        });

        DB::table('courses')->insert([
            'draft' => false,
            'category_id' => 1,
            'title' => 'Contoh Judul Course',
            'slug' => 'contoh-judul-course',
            'cover' => 'contoh-cover.jpg',
            'desc' => 'Ini adalah deskripsi course',
            'body' => 'Ini adalah konten atau isi course',
            'last_edited_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

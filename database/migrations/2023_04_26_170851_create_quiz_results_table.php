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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('quiz_id');
            $table->integer('attempt');
            $table->enum('state', ['Finished', 'Ongoing'])->default('Ongoing');
            // $table->dateTime('started_on')->nullable();
            // $table->dateTime('completed_on')->nullable();
            $table->string('time_taken')->nullable();
            $table->integer('total_questions')->nullable();
            $table->integer('unanswered_questions')->nullable();
            $table->integer('correct_answer')->nullable();
            $table->json('qna')->nullable();
            $table->integer('score')->nullable();
            $table->timestamps();
        });

        Schema::table('quiz_results', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};

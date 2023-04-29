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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->enum('status', ['Published', 'Draft'])->default('Published');
            $table->integer('time_limit')->nullable();
            $table->string('last_edited_by')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->unsignedBigInteger('quiz_id');
            $table->text('question');
            $table->text('answer_explanation')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_question_id');
            $table->string('answer');
            $table->boolean('is_correct');
            $table->timestamps();
        });

        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('quiz_question_id');
            $table->unsignedBigInteger('quiz_answer_id')->nullable();
            $table->boolean('flag')->default(false);
            $table->timestamps();
        });

        Schema::create('quiz_results', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->enum('state', ['Finished', 'Ongoing'])->default('Ongoing');
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('quiz_id');
            $table->integer('attempt');
            $table->json('qna')->nullable();
            $table->integer('total_questions')->nullable();
            $table->integer('unanswered_questions')->nullable();
            $table->integer('correct_answer')->nullable();
            $table->integer('score')->nullable();
            $table->integer('time_left')->nullable();
            $table->timestamps();
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('quiz_questions', function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });

        Schema::table('quiz_answers', function (Blueprint $table) {
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onDelete('cascade');
        });

        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->foreignUlid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onDelete('cascade');
            $table->foreign('quiz_answer_id')->references('id')->on('quiz_answers')->onDelete('cascade');
        });

        Schema::table('quiz_results', function (Blueprint $table) {
            $table->foreignUlid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
        Schema::dropIfExists('quiz_questions');
        Schema::dropIfExists('quiz_answers');
        Schema::dropIfExists('quiz_attempts');
        Schema::dropIfExists('quiz_results');
    }
};

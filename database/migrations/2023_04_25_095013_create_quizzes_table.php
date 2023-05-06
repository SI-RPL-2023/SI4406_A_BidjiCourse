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
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('status', ['Published', 'Draft'])->default('Draft');
            $table->bigInteger('time_limit')->nullable();
            $table->string('added_by')->nullable();
            $table->string('last_edited_by')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            // $table->integer('number')->nullable();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->text('question');
            $table->text('answer_explanation')->nullable();
            $table->timestamps();
        });

        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_question_id')->constrained()->onDelete('cascade');
            $table->string('answer');
            $table->boolean('is_correct');
            $table->timestamps();
        });

        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_question_id');
            $table->foreignId('quiz_answer_id')->nullable();
            $table->boolean('flag')->default(false);
            $table->timestamps();
        });

        Schema::create('quiz_results', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->enum('state', ['Finished', 'Ongoing'])->default('Ongoing');
            $table->foreignUlid('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->integer('attempt');
            $table->json('qna')->nullable();
            $table->integer('total_questions')->nullable();
            $table->integer('unanswered_questions')->nullable();
            $table->integer('correct_answer')->nullable();
            $table->integer('score')->nullable();
            $table->integer('time_left')->nullable();
            $table->timestamps();
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

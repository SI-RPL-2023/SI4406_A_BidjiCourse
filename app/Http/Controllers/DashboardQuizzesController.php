<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Http\Requests\DashboardQuizzesRequest;
use App\Http\Requests\DashboardQuizQuestionsRequest;

class DashboardQuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.quizzes.index', [
            'title' => 'Quizzes Management',
            'quizzes' => Quiz::with('course', 'course.category')->withCount('questions')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.quizzes.quiz-form', [
            'title' => 'Add New Quiz',
            'courses' => Course::with('category')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DashboardQuizzesRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = auth()->user()->full_name;
        $data['last_edited_by'] = auth()->user()->full_name;
        $data['time_limit'] = $request->time_limit == 0 ? null : $request->time_limit;
        $data['status'] = $request->submit == 'draft' ? 'Draft' : ($request->submit == 'done' ? 'Published' : 'Draft');
        $quiz = Quiz::create($data);
        return redirect(route('quizzes.index'))
            ->with('alert', 'success')
            ->with('html', "Quiz <strong>{$quiz->name}</strong> berhasil ditambahkan!");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeQuestions(DashboardQuizQuestionsRequest $request)
    {
        $request->validated();
        $question = QuizQuestion::create([
            'quiz_id' => $request->quiz_id,
            'question' => $request->question,
            'answer_explanation' => $request->explanation
        ]);
        foreach ($request->answers as $key => $value) {
            $is_correct = $key == $request->is_correct ? 1 : 0;
            QuizAnswer::create([
                'quiz_question_id' => $question->id,
                'answer' => $value,
                'is_correct' => $is_correct,
            ]);
        }
        return redirect(route('quizzes.showQuestions', $request->quiz_id) . "#{$question->quiz->questions->count()}")
            ->with('alert', 'success')
            ->with('html', "Pertanyaan berhasil ditambahkan!")
            ->with('number', $question->quiz->questions->count());
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Display the questions for the specified resource.
     */
    public function showQuestions(Quiz $quiz)
    {
        return view('pages.dashboard.quizzes.question-form', [
            'title' => 'Quiz Questions',
            'quiz' => $quiz
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        return view('pages.dashboard.quizzes.quiz-form', [
            'title' => 'Edit Quiz',
            'quiz' => $quiz,
            'courses' => Course::with('category')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DashboardQuizzesRequest $request, Quiz $quiz)
    {
        $data = $request->validated();
        $data['last_edited_by'] = auth()->user()->full_name;
        $data['time_limit'] = $request->time_limit == 0 ? null : $request->time_limit;
        $data['status'] = $request->submit == 'draft' ? 'Draft' : ($request->submit == 'done' ? 'Published' : 'Draft');
        $quiz->update($data);
        return redirect(route('quizzes.index'))
            ->with('alert', 'success')
            ->with('html', "Quiz <strong>{$data['name']}</strong> berhasil diupdate!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateQuestions(DashboardQuizQuestionsRequest $request, QuizQuestion $quizQuestion)
    {
        $request->validated();
        $quizQuestion->update([
            'question' => $request->oldQuestion,
            'answer_explanation' => $request->oldExplanation,
        ]);
        foreach ($request->oldAnswers as $key => $value) {
            $is_correct = $key == $request->is_correct ? 1 : 0;
            $quizAnswer = QuizAnswer::find($key);
            $quizAnswer->update([
                'answer' => $value,
                'is_correct' => $is_correct,
            ]);
        }
        return redirect(route('quizzes.showQuestions', $quizQuestion->quiz->id) . "#{$request->number}")
            ->with('alert', 'success')
            ->with('html', "Pertanyaan ke $request->number berhasil diupdate!")
            ->with('number', $request->number);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect(route('quizzes.index'))
            ->with('alert', 'success')
            ->with('html', "Quiz <strong>$quiz->name</strong> berhasil dihapus!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyQuestions(QuizQuestion $quizQuestion)
    {
        $quizQuestion->delete();
        return redirect(route('quizzes.showQuestions', $quizQuestion->quiz->id))
            ->with('alert', 'success')
            ->with('text', 'Pertanyaan berhasil dihapus!');;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\QuizResult;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //* QuizAttempt
    {
        $attemptData = [
            'user_id' => auth()->user()->id,
            'quiz_id' => $request->quiz_id,
            'quiz_answer_id' => $request->answer_id
        ];
        QuizAttempt::updateOrInsert(
            ['quiz_question_id' => $request->question_id],
            $attemptData
        );
        return response()->json([
            'toast' =>'success',
            'message' => 'Answer saved'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($courseSlug) //* Quiz
    {
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $title = "Quiz - $course->title";
        $quiz = $course->quiz;
        $questions = QuizQuestion::where('quiz_id', $quiz->id)->paginate(1); //? ->inRandomOrder()
        $questions_all = QuizQuestion::where('quiz_id', $quiz->id)->get();
        if (!QuizResult::where('quiz_id', $quiz->id)
            ->where('user_id', auth()->user()->id)
            ->where('state', 'Ongoing')
            ->exists()) {
            QuizResult::create([
                'attempt' => QuizResult::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->count() + 1,
                'user_id' => auth()->user()->id,
                'quiz_id' => $quiz->id,
            ]);
        }
        return view('pages.quiz.show', compact('course', 'quiz', 'questions', 'questions_all', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)  //* QuizResult
    {
        $quizResult = QuizResult::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->where('state', 'Ongoing')->firstOrFail();
        // $quizResult = QuizResult::find();
        if ($quizResult) {
            function groupQuestionsAndAnswers(object $attempt)
            {
                foreach ($attempt as $att) {
                    $questionAndAnswer[$att->quiz_question_id] = $att->quiz_answer_id;
                }
                return $questionAndAnswer;
            }
            function checkCorrectAnswers(object $attempt)
            {
                foreach ($attempt as $att) {
                    $feedback = false;
                    foreach ($att->quiz->questions as $qsn) {
                        foreach ($qsn->answers as $ans) {
                            if ($ans->id == $att->quiz_answer_id) {
                                $feedback = $ans->is_correct;
                            }
                        }
                    }
                    $checkedAnswer[$att->quiz_question_id] = $feedback;
                }
                return $checkedAnswer;
            }
            function createQnaHistory(object $questions)
            {
                foreach ($questions as $qsn) {
                    $qnaHistory[] = $qsn;
                    foreach ($qsn->answers as $ans) {
                    }
                }
                return $qnaHistory;
            }
            function calculateResult(array $answers, int $totalQuestions)
            {
                $correctAnswers = 0;
                foreach ($answers as $answer) {
                    if ($answer == 1) {
                        $correctAnswers++;
                    }
                }
                $score = ($correctAnswers / $totalQuestions) * 100;
                return [
                    'correct_answers' => $correctAnswers,
                    'score' => number_format($score, 2)
                ];
            }
            // $attempt = QuizAttempt::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->whereNotNull('quiz_answer_id')->get();
            $attempt = QuizAttempt::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->get();
            $questions = QuizQuestion::where('quiz_id', $quiz->id)->get(); //! or $quiz->questions
            $checkedAnswer = checkCorrectAnswers($attempt);
            $result = calculateResult($checkedAnswer, $questions->count());
            $checkedAnswer = json_encode($checkedAnswer);
            $time_taken = $quizResult->created_at->diff(now())->format('%h jam %i menit %s detik');
            $quizResult->update(
                [
                    'user_id' => auth()->user()->id,
                    'quiz_id' => $quiz->id,
                    'total_questions' => $questions->count(),
                    'correct_answer' => $result['correct_answers'],
                    'score' => $result['score'],
                    'state' => 'Finished',
                    'answers' => $checkedAnswer,
                    'time_taken' => $time_taken,
                ]
            );
            QuizAttempt::where('quiz_id', $quiz->id)
                ->where('user_id', auth()->user()->id)
                ->delete();
            return $result;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function flag(int $quiz_id, int $question_id)
    {
        $flag = !QuizAttempt::where('user_id', auth()->user()->id)->where('quiz_id', $quiz_id)->where('quiz_question_id', $question_id)->where('flag', true)->exists();
        $attemptData = [
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz_id,
            'flag' => $flag
        ];
        QuizAttempt::updateOrInsert(
            ['quiz_question_id' => $question_id],
            $attemptData
        );
        return response()->json([
            'toast' => 'info',
            'message' => $flag == true ? 'Question flagged' : 'Flag removed',
            'flag' => $flag
        ]);
    }

    public function preSubmitCheck(int $quiz_id, int $question_id)
    {
        
    }
}

//? $questions = $course->quiz->questions;
//? $questions = $course->quiz->questions;
//? foreach ($course->quiz->questions as $q){
//?     return $q->answers;
//? }
//? $answers = QuizAnswer::where('quiz_question_id', 1)->whereNotNull('quiz_question_id')->get();
//? return $course->quiz->questions->pluck('id');
//? $quiz = Quiz::where('course_id', $course->id)->firstOrFail();
//? $question = QuizQuestion::where('quiz_id', $quiz->id)->first();
//? foreach ($questions as $q) {
//?     return $q->answers;
//?     foreach ($q->answers as $a) {
//?         return $a->answer;
//?     };
//? }
//? return $questions;
//? $answers = QuizAnswer::where('quiz_question_id', $question->id)->get();
//? return [$quiz, $quiz->questions, $question->answers];

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
            'toast' => 'success',
            'message' => 'Answer saved'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->first();
        if (empty($course)) {
            return abort(404); //jika user mencoba merubah slug
        }
        $user_id = auth()->user()->id;
        $title = "Quiz - $course->title";
        if (!$course->quiz) {
            return redirect()->back()->withErrors('Quiz not found');
        }
        $questions = $course->quiz->questions()->paginate(1);
        $allQuestions = $course->quiz->questions;
        $result = $course->quiz->results()->where('user_id', $user_id);
        if (!$result->where('state', 'Ongoing')->exists()) {
            QuizResult::create([
                'attempt' => $course->quiz->results()->where('user_id', $user_id)->count() + 1,
                'user_id' => $user_id,
                'quiz_id' => $course->quiz->id,
                'time_left' => $course->quiz->time_limit ? $course->quiz->time_limit : null
            ]);
        }
        $time_left = null;
        if ($course->quiz->time_limit) {
            $quizResult = $result->where('state', 'Ongoing')->first();
            $time_left = $course->quiz->time_limit - ($quizResult->created_at->diffInSeconds(now()));
            $quizResult->update(['time_left' => $time_left]);
        }
        return view('pages.quiz.show', compact('course', 'questions', 'allQuestions', 'title', 'time_left'));
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
        function checkCorrectAnswers(object $attempt): array
        {
            foreach ($attempt as $att) {
                $feedback = 0;
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
        function calculateResult(array $checkedAnswer, int $totalQuestions): array
        {
            $correctAnswers = 0;
            foreach ($checkedAnswer as $answer) {
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
        function createQnaHistory(object $attempt): array
        {
            $qnaHistory = [];
            $answersId = [];
            foreach ($attempt as $att) {
                if (is_null($att->quiz_answer_id)) {
                    continue;
                }
                foreach ($att->quiz->questions as $qsn) {
                    $answersArray = [];
                    $isCorrect = true;
                    foreach ($qsn->answers as $ans) {
                        if (!in_array($att->quiz_answer_id, $answersId, true)) {
                            $answersId[] = $att->quiz_answer_id;
                        }
                        $selected = (in_array($ans->id, $answersId, true)) ? 1 : 0;
                        $isCorrectAnswer = ($ans->is_correct == 1) ? true : false;
                        if ($selected != $isCorrectAnswer) {
                            $isCorrect = false;
                        }
                        $answersArray[] = [
                            'option' => $ans->answer,
                            'is_correct' => $ans->is_correct,
                            'selected' => $selected
                        ];
                    }
                    $qnaHistory[$qsn->id] = [
                        'question' => $qsn->question,
                        'answer_explanation' => $qsn->answer_explanation,
                        'answers' => $answersArray,
                        'is_correct' => $isCorrect
                    ];
                }
            }
            return $qnaHistory;
        }
        $user_id = auth()->user()->id;
        $quizResult = QuizResult::where('quiz_id', $quiz->id)
            ->where('user_id', $user_id)
            ->where('state', 'Ongoing')
            ->first();
        if (empty($quizResult)) {
            return abort(404); //jika user mencoba merubah request quiz id pada halaman html
        }
        $attempt = QuizAttempt::where('quiz_id', $quiz->id)
            ->where('user_id', $user_id)
            ->whereNotNull('quiz_answer_id')
            ->get();
        if ($attempt->isEmpty()) {
            QuizAttempt::where('quiz_id', $quiz->id)
                ->where('user_id', $user_id)
                ->delete();
            $quizResult->delete();
            return redirect((route('materi.show', $quiz->course->slug)))
                ->with('alert-confirm', 'info')
                ->with('text', 'Kamu belum menjawab soal sama sekali, ingin mengulangi quiz?')
                ->with('action', 'document.location.href = "' . route('quiz.show', $quiz->course->slug) . '"');
        }
        $checkedAnswer = checkCorrectAnswers($attempt);
        $result = calculateResult($checkedAnswer, $quiz->questions->count());
        $qnaHistory = createQnaHistory($attempt);
        $total = QuizQuestion::where('quiz_id', $quiz->id)->count();
        $answered = QuizAttempt::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->whereNotNull('quiz_answer_id')->count();
        $quizResult->update(
            [
                'user_id' => $user_id,
                'quiz_id' => $quiz->id,
                'course_name' => $quiz->course->title,
                'total_questions' => $quiz->questions->count(),
                'correct_answer' => $result['correct_answers'],
                'score' => $result['score'],
                'unanswered_questions' => $total - $answered,
                'state' => 'Finished',
                'qna' => json_encode($qnaHistory),
                'time_left' => null,
            ]
        );
        QuizAttempt::where('quiz_id', $quiz->id)
            ->where('user_id', $user_id)
            ->delete();
        return redirect(route('quiz.result', $quizResult->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function flag(int $quiz_id, int $question_id) //* Quiz Attempt
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

    public function preSubmitCheck(int $quiz_id) //* Quiz Attempt
    {
        $total = QuizQuestion::where('quiz_id', $quiz_id)->count();
        $answered = QuizAttempt::where('quiz_id', $quiz_id)->where('user_id', auth()->user()->id)->whereNotNull('quiz_answer_id')->count();
        $flagged = QuizAttempt::where('quiz_id', $quiz_id)->where('user_id', auth()->user()->id)->where('flag', true)->count();
        $unAnswered = $total - $answered;
        $message = '<p>Apakah kamu yakin ingin mengumpulkan quiz ini?</p>';
        $unasweredMessage =  "<span>Pertanyaan belum terjawab: <strong><span class='badge text-bg-danger border'>$unAnswered</span></strong></span><br>";
        $flaggedMessage =  "<span>Pertanyaan ditandai: <strong><span class='badge text-bg-warning border'>$flagged</span></strong></span><br>";
        if ($unAnswered > 0 && $flagged > 0) {
            $message = $message . $unasweredMessage . $flaggedMessage;
        } else if ($flagged > 0) {
            $message = $message . $flaggedMessage;
        } else if ($unAnswered > 0) {
            $message = $message . $unasweredMessage;
        }
        return response()->json([
            'html' => $message
        ]);
    }

    public function result($uuid) //* Quiz
    {
        $result = QuizResult::where('id', $uuid)
            ->where('user_id', auth()->user()->id)
            ->where('state', 'Finished')
            ->first();
        if (empty($result)) {
            return abort(404);
        }
        $qna = json_decode($result->qna);
        $title = "Quiz Review - {$result->quiz->course->title}";
        return view('pages.quiz.result', compact('result', 'title', 'qna'));
    }
}
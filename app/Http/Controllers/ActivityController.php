<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Activity;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::where('user_id', auth()->user()->id)->where('status', 'study')->with('course')->orderByDesc('updated_at')->get();
        $quizResults = QuizResult::with('quiz', 'quiz.course')->orderByDesc('updated_at')->get();
        return view('pages.activity.index', [
            'title' => 'Favorite Courses',
            'activities' => $activities,
            'quizResults' => $quizResults,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        Activity::updateOrInsert(
            [
                'user_id' => auth()->user()->id,
                'course_id' => $activity->course->id
            ],
            [
                'status' => 'finished',
                'updated_at' => now()
            ]
        );
        return response()->json([
            'toast' => 'success',
            'message' => 'Histori belajarmu berhasil dihapus!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

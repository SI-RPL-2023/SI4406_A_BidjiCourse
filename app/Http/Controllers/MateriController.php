<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('draft', false)
            ->with('category', 'quiz')
            ->search(request('search'))
            ->category(request('category'))
            ->sort(request('sort'))
            ->paginate(9)
            ->withQueryString();
        return view('pages.materi.index', [
            'title' => 'Materi',
            'courses' => $courses,
            'categories' => Category::get()
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
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->with('quiz')->firstOrFail();
        if ($course->draft) {
            return redirect(route('materi.index'))
                ->with('alert', 'info')
                ->with('html', "Materi <strong>{$course->title}</strong> belum dapat diakses untuk saat ini.");
        }
        Activity::updateOrInsert(
            [
                'user_id' => auth()->user()->id,
                'course_id' => $course->id
            ],
            [
                'status' => 'study',
                'updated_at' => now()
            ]
        );
        return view('pages.materi.show', [
            'title' => $course->title,
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    /**
     * Autocomplete ajax.
     */
    public function search($keyword)
    {
        $titles = Course::select('title')
            ->where('draft', false)
            ->where('title', 'LIKE', "%$keyword%")
            ->limit(5)
            ->orderBy('title')
            ->pluck('title')
            ->toArray();
        return response()->json($titles);
    }
}

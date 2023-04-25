<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.materi.index', [
            'title' => 'Bidji Course | Materi',
            'courses' => Course::where('draft', false)->paginate(10)
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
        $course = Course::where('slug', $slug)->first();
        if (empty($course) || $course->draft) {
            return redirect(route('materi.index'));
        }
        return view('pages.materi.detail', [
            'title' => $course->title,
            'course' => $course
        ]);
        return view('pages.materi.detail', ['course' => $course]);
        return view('pages.materi.detail', compact($course));
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
}

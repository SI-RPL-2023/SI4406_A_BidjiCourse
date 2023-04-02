<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.courses.index', [
            'title' => 'Courses Management',
            'courses' => Course::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.courses.add', [
            'title' => 'Add Course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courseData = $request->validate(
            [
                'title' => ['required', 'unique:courses'],
                'slug' => ['required', 'unique:courses'],
                'cover' => ['image', 'file', 'max:5120', 'required'],
                'desc' => 'required',
                'body' => 'required',
            ],
            array(
                'title.required' => 'Judul course harus di isi.',
                'title.unique' => 'Course ini sudah ada.',
                'slug.required' => 'Judul course belum diisi.',
                'slug.unique' => 'Slug tidak tersedia, silahkan cari judul lain.',
                'cover.required' => 'Cover harus dipilih.',
                'cover.image' => 'File tidak didukung.',
                'cover.max' => 'Ukuran file max 5mb.',
                'desc.required' => 'Deskripsi harus diisi.',
                'body.required' => 'Materi harus diisi.',
            )
        );
        Course::create($courseData);
        return redirect('/dashboard/courses')
            ->with('alert', 'success')
            ->with('text', 'Course ' . $request->title . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.detail', [
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

    public function createSlug(Request $request)
    {
        return Str::slug($request->title, '-');
    }
}

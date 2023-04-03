<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'title' => 'Add New Course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // mencegah agar slug tidak diubah
        if ($request->slug != Str::slug($request->title, '-')) {
            return redirect('/dashboard/courses')
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena judul dan slug tidak selaras. Apakah anda mencoba menggantinya secara manual?');
        }
        if ($request->submit === 'draft') {
            $draft = true;
        } elseif ($request->submit === 'done') {
            $draft = false;
        } else {
            return redirect('/dashboard/courses')
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah anda mencoba menggantinya secara manual?');
        };
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
        $cover_file_name = $request->slug . '.' . $request->cover->extension();
        $request->file('cover')->move(public_path('/img/courses'), $cover_file_name);
        $courseData['cover'] = '/img/courses/' . $cover_file_name;
        $courseData['draft'] = $draft;
        Course::create($courseData);
        return redirect('/dashboard/courses')
            ->with('alert', 'success')
            ->with('html', 'Course <strong>' . $request->title . '</strong> berhasil ditambahkan!');
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
        return view('dashboard.courses.edit', [
            'title' => 'Edit Course',
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // mencegah agar slug tidak diubah
        if ($request->slug != Str::slug($request->title, '-')) {
            return redirect('/dashboard/courses/'.$course->slug.'/edit')
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena judul dan slug tidak selaras. Apakah anda mencoba menggantinya secara manual?');
        }
        if ($request->submit === 'draft') {
            $draft = true;
        } elseif ($request->submit === 'done') {
            $draft = false;
        } else {
            return redirect('/dashboard/courses')
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah anda mencoba menggantinya secara manual?');
        };
        $rules = [
            'desc' => 'required',
            'body' => 'required',
        ];
        if ($request->title != $course->title) {
            $rules['title'] = ['required', 'unique:courses'];
        };
        if ($request->slug != $course->slug) {
            $rules['slug'] = ['required', 'unique:courses'];
        }
        if ($request->cover) {
            $rules['cover'] = ['image', 'file', 'max:5120', 'required'];
        };
        $courseData = $request->validate($rules, array(
            'title.required' => 'Judul course harus di isi.',
            'title.unique' => 'Course ini sudah ada.',
            'slug.required' => 'Judul course belum diisi.',
            'slug.unique' => 'Slug tidak tersedia, silahkan cari judul lain.',
            'cover.required' => 'Cover harus dipilih.',
            'cover.image' => 'File tidak didukung.',
            'cover.max' => 'Ukuran file max 5mb.',
            'desc.required' => 'Deskripsi harus diisi.',
            'body.required' => 'Materi harus diisi.',
        ));
        if ($request->cover) {
            @unlink(public_path($course->cover));
            $cover_file_name = $request->slug . '.' . $request->cover->extension();
            $request->file('cover')->move(public_path('img/courses'), $cover_file_name);
            $courseData['cover'] = '/img/courses/' . $cover_file_name;
        } elseif (!$request->cover && $request->slug != $course->slug) {
            $file_extension = '.' . pathinfo($course->cover, PATHINFO_EXTENSION);
            $new_path = '/img/courses/' . $request->slug . $file_extension;
            File::move(public_path($course->cover), public_path($new_path));
            $courseData['cover'] = $new_path;
        };
        $courseData['draft'] = $draft;
        Course::find($course->id)->update($courseData);
        return redirect('/dashboard/courses')
            ->with('alert', 'success')
            ->with('html', 'Course <strong>' . $course->title . '</strong> berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        @unlink(public_path($course->cover));
        $course->delete();
        return redirect('/dashboard/courses')
            ->with('alert', 'success')
            ->with('html', 'Course <strong>' . $course->title . '</strong> berhasil dihapus!');
    }

    public function createSlug(Request $request)
    {
        return Str::slug($request->title, '-');
    }
}

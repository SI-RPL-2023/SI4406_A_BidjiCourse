<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DashboardCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.courses.index', [
            'title' => 'Courses Management',
            'courses' => Course::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.courses.form', [
            'title' => 'Add New Course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        if ($data['submit'] === 'draft') {
            $draft = true;
        } elseif ($data['submit'] === 'done') {
            $draft = false;
        } else {
            return redirect(route('courses.index'))
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah anda mencoba menggantinya secara manual?');
        };
        $rules = [
            'title' => ['required', 'unique:courses'],
            'slug' => ['required', 'unique:courses'],
            'cover' => ['image', 'file', 'max:5120', 'required'],
            'desc' => 'required',
            'body' => 'required',
        ];
        $messages = [
            'title.required' => 'Judul course harus di isi.',
            'title.unique' => 'Course ini sudah ada.',
            'slug.required' => 'Judul course belum diisi.',
            'slug.unique' => 'Slug tidak tersedia, silahkan cari judul lain.',
            'cover.required' => 'Cover harus dipilih.',
            'cover.image' => 'File tidak didukung.',
            'cover.max' => 'Ukuran file max 5mb.',
            'desc.required' => 'Deskripsi harus diisi.',
            'body.required' => 'Materi harus diisi.',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $cover = $data['slug'] . '.' . $data['cover']->extension();
            $request->file('cover')->move(public_path('/img/courses'), $cover);
            $data['cover'] = '/img/courses/' . $cover;
            $data['last_edited_by'] = auth()->user()->id;
            $data['draft'] = $draft;
            Course::create($data);
            return redirect('/dashboard/courses')
                ->with('alert', 'success')
                ->with('html', 'Course <strong>' . $data['title'] . '</strong> berhasil ditambahkan!');
        }
        return redirect()->back()->withErrors($validator)->withInput()->with('slug', $data['slug']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('pages.dashboard.courses.detail', [
            'title' => $course->title,
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('pages.dashboard.courses.form', [
            'title' => 'Edit Course: ' . $course->title,
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        if ($request->submit === 'draft') {
            $draft = true;
        } elseif ($request->submit === 'done') {
            $draft = false;
        } else {
            return redirect(route('courses.index'))
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah anda mencoba menggantinya secara manual?');
        };
        $rules = [
            'desc' => 'required',
            'body' => 'required',
        ];
        if ($data['title'] != $course->title) {
            $rules['title'] = ['required', 'unique:courses'];
        };
        if ($data['slug'] != $course->slug) {
            $rules['slug'] = ['required', 'unique:courses'];
        }
        if (isset($data['cover'])) {
            $rules['cover'] = ['image', 'file', 'max:5120', 'required'];
        };
        $messages = [
            'title.required' => 'Judul course harus di isi.',
            'title.unique' => 'Course ini sudah ada.',
            'slug.required' => 'Judul course belum diisi.',
            'slug.unique' => 'Slug tidak tersedia, silahkan cari judul lain.',
            'cover.required' => 'Cover harus dipilih.',
            'cover.image' => 'File tidak didukung.',
            'cover.max' => 'Ukuran file max 5mb.',
            'desc.required' => 'Deskripsi harus diisi.',
            'body.required' => 'Materi harus diisi.',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            if (isset($data['cover'])) {
                unlink(public_path($course->cover));
                $cover = $data['slug'] . '.' . $data['cover']->extension();
                $request->file('cover')->move(public_path('img/courses'), $cover);
                $data['cover'] = '/img/courses/' . $cover;
            } elseif (!isset($data['cover']) && $data['slug'] != $course->slug) {
                $file_extension = '.' . pathinfo($course->cover, PATHINFO_EXTENSION);
                $new_path = '/img/courses/' . $data['slug'] . $file_extension;
                File::move(public_path($course->cover), public_path($new_path));
                $data['cover'] = $new_path;
            };
            $data['last_edited_by'] = auth()->user()->id;
            $data['draft'] = $draft;
            $course->update($data);
            return redirect(route('courses.index'))
                ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->header('Pragma', 'no-cache')
                ->with('alert', 'success')
                ->with('html', 'Course <strong>' . $course->title . '</strong> berhasil diupdate!');
        }
        return redirect()->back()->withErrors($validator)->withInput()->with('slug', $data['slug']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        unlink(public_path($course->cover));
        return redirect(route('courses.index'))
            ->with('alert', 'success')
            ->with('html', 'Course <strong>' . $course->title . '</strong> berhasil dihapus!');
    }

    /**
     * Create a slug from resource's title.
     */
    public function createSlug(Request $request)
    {
        return Str::slug($request->title, '-');
    }
}

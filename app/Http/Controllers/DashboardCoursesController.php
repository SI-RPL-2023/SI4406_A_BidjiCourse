<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DashboardCoursesRequest;

class DashboardCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.courses.index', [
            'title' => 'Courses Management',
            'courses' => Course::with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.courses.form', [
            'title' => 'Add New Course',
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeBACKUP(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        if ($data['submit'] === 'draft') {
            $draft = true;
        } elseif ($data['submit'] === 'done') {
            $draft = false;
        } else {
            return redirect(route('courses.index'))
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah kamu mencoba menggantinya secara manual?');
        };
        $rules = [
            'title' => ['required', 'unique:courses'],
            'slug' => ['required', 'unique:courses'],
            'cover' => ['image', 'file', 'max:5120', 'required'],
            'desc' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::in(Category::pluck('id')->all())],
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
            'category_id.required' => 'Mata pelajaran harus dipilih.',
            'category_id.in' => 'Mata pelajaran tidak tersedia, silahkan tambahkan terlebih dahulu.',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()) {
            $cover = $data['slug'] . '.' . $data['cover']->extension();
            $request->file('cover')->move(public_path('/img/courses'), $cover);
            $data['cover'] = '/img/courses/' . $cover;
            $data['added_by'] = auth()->user()->full_name;
            $data['last_edited_by'] = auth()->user()->full_name;
            $data['draft'] = $draft;
            Course::create($data);
            return redirect('/dashboard/courses')
                ->with('alert', 'success')
                ->with('html', 'Course <strong>' . $data['title'] . '</strong> berhasil ditambahkan!');
        }
        return redirect()->back()->withErrors($validator)->withInput()->with('slug', $data['slug']);
    }
    public function store(DashboardCoursesRequest $request)
    {
        $data = $request->validated();
        $cover = "{$data['slug']}.{$data['cover']->extension()}";
        $request->file('cover')->move(public_path('/img/courses'), $cover);
        $data['cover'] = "/img/courses/$cover";
        $data['added_by'] = auth()->user()->full_name;
        $data['last_edited_by'] = auth()->user()->full_name;
        $data['draft'] = $data['submit'] == 'draft' ? 1 : ($data['submit'] == 'done' ? 0 : 1);
        Course::create($data);
        return redirect(route('courses.show', $data['slug']))
            ->with('alert', 'success')
            ->with('html', "Course <strong>{$data['title']}</strong> berhasil ditambahkan!");
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('pages.dashboard.courses.show', [
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
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBACKUP(Request $request, Course $course)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        if ($request->submit === 'draft') {
            $draft = true;
        } elseif ($request->submit === 'done') {
            $draft = false;
        } else {
            return redirect(route('courses.index'))
                ->with('alert', 'error')
                ->with('title', 'Submit error')
                ->with('text', 'Error ini terjadi karena server tidak dapat membaca value submit yang ada. Apakah kamu mencoba menggantinya secara manual?');
        };
        $rules = [
            'desc' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::in(Category::pluck('id')->all())],
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
            'category_id.required' => 'Mata pelajaran harus dipilih.',
            'category_id.in' => 'Mata pelajaran tidak tersedia, silahkan tambahkan terlebih dahulu.',
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
            $data['last_edited_by'] = auth()->user()->full_name;
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
    public function update(DashboardCoursesRequest $request, Course $course)
    {
        $data = $request->validated();
        if (isset($data['cover'])) {
            try {
                unlink(public_path($course->cover));
            } catch (\Exception $e) {
                // Do nothing
            }
            $cover = $data['slug'] . '.' . $data['cover']->extension();
            $request->file('cover')->move(public_path('img/courses'), $cover);
            $data['cover'] = "/img/courses/$cover";
        } elseif (!isset($data['cover']) && $data['slug'] != $course->slug) {
            try {
                $file_extension = pathinfo($course->cover, PATHINFO_EXTENSION);
                $new_path = "/img/courses/{$data['slug']}.$file_extension";
                File::move(public_path($course->cover), public_path($new_path));
                $data['cover'] = $new_path;
            } catch (\Exception $e) {
                // Do nothing
            }
        };
        $data['last_edited_by'] = auth()->user()->full_name;
        $data['draft'] = $data['submit'] == 'draft' ? 1 : ($data['submit'] == 'done' ? 0 : 1);
        $course->update($data);
        return redirect(route('courses.show', $data['slug']))
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->with('alert', 'success')
            ->with('html', "Course <strong>{$data['title']}</strong> berhasil diupdate!");
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
}

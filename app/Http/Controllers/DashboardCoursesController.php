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
    }
    ;
    $data['last_edited_by'] = auth()->user()->full_name;
    $data['draft'] = $data['submit'] == 'draft' ? 1 : ($data['submit'] == 'done' ? 0 : 1);
    $course->update($data);
    return response()
      ->redirectTo(route('courses.show', $data['slug']))
      ->with('alert', 'success')
      ->with('html', "Course <strong>{$data['title']}</strong> berhasil diupdate!")
      ->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate',
        'Pragma' => 'no-cache',
        'Expires' => '0',
      ]);
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

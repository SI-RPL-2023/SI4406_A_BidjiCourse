<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\DashboardCategoriesRequest;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.categories.index', [
            'title' => 'Categories Management',
            'categories' => Category::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.categories.form', [
            'title' => 'Add New Category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DashboardCategoriesRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = auth()->user()->full_name;
        $data['last_edited_by'] = auth()->user()->full_name;
        Category::create($data);
        return redirect(route('categories.index'))
            ->with('alert', 'success')
            ->with('html', "Mata pelajaran <strong>{$data['name']}</strong> berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.dashboard.categories.form', [
            'title' => 'Edit Category: ' . $category->name,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DashboardCategoriesRequest $request, Category $category)
    {
        $data = $request->validated();
        $data['last_edited_by'] = auth()->user()->full_name;
        $category->update($data);
        return redirect(route('categories.index'))
            ->with('alert', 'success')
            ->with('html', "Mata pelajaran <strong>{$data['name']}</strong> berhasil diupdate!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $courses = $category->courses;
        $category->delete();
        foreach ($courses as $course){
            unlink(public_path($course->cover));
        }
        return redirect(route('categories.index'))
            ->with('alert', 'success')
            ->with('html', "Mata pelajaran <strong>$category->name</strong> beserta course terkait berhasil dihapus!");
    }
}

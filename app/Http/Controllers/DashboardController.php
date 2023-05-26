<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the index of dashboard.
     */
    public function index()
    {
        return view('pages.dashboard.index', [
            'title' => 'Bidji Course | Dashboard',
            'courses' => Course::count(),
            'categories' => Category::count(),
            'admins' => User::where('is_admin', true)->count(),
            'students' => User::where('is_admin', false)->count(),
        ]);
    }

    /**
     * Display the setting page of dashboard.
     */
    public function settings()
    {
        return view('pages.dashboard.settings', [
            'title' => 'Dashboard | Settings',
        ]);
    }

    /**
     * Create a slug from a string.
     */
    public function createSlug(Request $request)
    {
        return Str::slug($request->string);
    }
}

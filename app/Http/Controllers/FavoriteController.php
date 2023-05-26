<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->user()->id)->where('favorited', true)->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $favorites)->with('category')->paginate(9)->withQueryString();
        return view('pages.favorite.index', [
            'title' => 'Favorite Courses',
            'courses' => $courses
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
        $course = Course::where('slug', $request->course_slug)->firstOrfail();
        $favorited = Favorite::where('course_id', $course->id)->where('user_id', auth()->user()->id)->where('favorited', true)->exists();
        Favorite::updateOrInsert(
            [
                'user_id' => auth()->user()->id,
                'course_id' => $course->id
            ],
            [
                'favorited' => $favorited ? false : true
            ]
        );
        $favoriteCount = $favorited ? $course->favorite - 1 : $course->favorite + 1;
        $course->update([
            'favorite' => $favoriteCount
        ]);
        $text = $favorited ? 'hapus dari' : 'tambahkan ke';
        return response()->json([
            'toast' => 'success',
            'message' => "$course->title berhasil di$text favorite!",
            'icon' => $favorited ? '<i class="ti text-black ti-bookmark fs-5"></i>' : '<i class="ti text-warning ti-bookmark-filled fs-5"></i>',
            'count' => $favoriteCount
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}

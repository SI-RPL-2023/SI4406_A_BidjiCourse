<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function countCourse($course_id)
    {
        $countCourse = Course::where([
            'user_id' => auth()->user()->id,
            'course_id' => $course_id,
        ])->count();
        return $countCourse;
    }
}

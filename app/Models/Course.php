<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function scopeSearch($query, $keyword)
    {
        if ($keyword) {
            return $query->where('title', 'LIKE', "%$keyword%")
                ->orwhere('desc', 'LIKE', "%$keyword%")
                ->orwhere('slug', 'LIKE', "%$keyword%");
        }
    }

    public function scopeCategory($query, $slug)
    {
        if ($slug) {
            $category = Category::where('slug', $slug)->firstOrFail();
            return $query->where('category_id', $category->id);
        }
    }

    public function scopeSort($query, $type)
    {
        if ($type) {
            if ($type == 'new') {
                return $query->orderByDesc('created_at');
            }
            else if ($type == 'old') {
                return $query->orderBy('created_at');
            }
            else if ($type == 'title') {
                return $query->orderBy('title');
            }
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

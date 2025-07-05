<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'slug', 'category', 'description', 'price', 'image', 'level', 'instructor_id'];

    protected static function booted(): void
    {
        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });

        static::updating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);
            }
        });
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function videos()
    {
        return $this->hasMany(Content::class)->where('type', 'video');
    }

    public function totalDurationInMinutes(): int
    {
        return $this->videos()->sum('duration');
    }

    public function formattedDuration(): string
    {
        $minutes = $this->totalDurationInMinutes();
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;

        return ($hours ? "{$hours}h " : '') . ($mins ? "{$mins}m" : '');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'price',
        'image',
        'level',
        'instructor_id',
    ];

    // Auto-generate slug from title
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

    // Relationship to instructor
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Relationship to videos/lessons
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    // Calculate total duration based on videos
    public function totalDurationInMinutes(): int
    {
        return $this->videos()->sum('duration'); // assumed in minutes
    }

    // Format duration like "2h 15m"
    public function formattedDuration(): string
    {
        $minutes = $this->totalDurationInMinutes();
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;

        return ($hours ? "{$hours}h " : '') . ($mins ? "{$mins}m" : '');
    }
}

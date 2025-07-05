<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'type',
        'title',
        'content_text',
        'video_url',
        'duration',
        'quiz_data',
    ];

    // Content belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Optional: Cast quiz JSON to array
    protected $casts = [
        'quiz_data' => 'array',
    ];
}

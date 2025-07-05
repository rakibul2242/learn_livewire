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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected $casts = [
        'quiz_data' => 'array',
    ];
}

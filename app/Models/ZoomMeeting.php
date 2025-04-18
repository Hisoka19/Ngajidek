<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'zoom_meeting_id',
        'join_url',
        'start_time',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

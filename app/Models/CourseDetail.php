<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $fillable = ['course_id', 'slug', 'title', 'desc', 'iframe'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

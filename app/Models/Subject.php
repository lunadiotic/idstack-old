<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['parent_id', 'slug', 'subject'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['level'];

    /**
     * Relationship
     * Level hasMany Courses
     * @return void
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

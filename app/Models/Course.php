<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Searchable;

    protected $fillable = ['user_id', 'level_id', 'slug', 'title', 'desc', 'price', 'image'];

    public function detail()
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function software()
    {
        return $this->belongsToMany(Software::class);
    }

    /**
     * Get the index name for the model
     *
     * @return void
     */
    public function searchableAs()
    {
        return 'courses_index';
    }
}

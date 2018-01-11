<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['slug', 'software'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

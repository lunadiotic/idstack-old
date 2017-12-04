<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = ['software'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}

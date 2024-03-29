<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'activation_token', 'role', 'image',
        'title', 'phone', 'facebook', 'twitter', 'github', 'desc', 'x'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'x'
    ];

    /**
     * Query scoupe by activation columns
     * active & activation_token
     * @param Builder $builder
     * @param [type] $email
     * @param [type] $token
     * @return void
     */
    public function scopeByActivationColumns(Builder $builder, $email, $token)
    {
        return $builder->where('email', $email)->where('activation_token', $token);
    }

    /**
     * Relationship
     * User hasMany Courses
     * @return void
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

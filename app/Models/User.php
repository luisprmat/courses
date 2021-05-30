<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image()
    {
        return $this->profile_photo_url;
    }

    /** Relationships */
    // One To One
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // One To Many
    public function dictatedCourses()
    {
        return $this->hasMany(Course::class);
    }

    // One To Many
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // One To Many
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // One To Many
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    // Many To Many
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class);
    }

    // Many To Many
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
}

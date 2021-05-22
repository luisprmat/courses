<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    const DRAFT = 1;
    const REVISION = 2;
    const PUBLISHED = 3;

    public function getRatingAttribute()
    {
        return $this->reviews_count ? $this->reviews->avg('rating') : 5;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /** Relationships */
    // One To Many
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // One To Many
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    // One To Many
    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    // One To Many
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    // One To Many
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    // One To Many (inverse)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One To Many (inverse)
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // One To Many (inverse)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // One To Many (inverse)
    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // Many To Many
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    // One To One (Polymorphic)
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough(Lesson::class, Section::class);
    }
}

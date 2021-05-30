<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->id());
    }

    /** Relationships */
    // One To One
    public function description()
    {
        return $this->hasOne(Description::class);
    }

    // One To Many (inverse)
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // One To Many (inverse)
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // Many To Many
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // One To One (Polymorphic)
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    // One To Many (Polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // One To Many (Polymorphic)
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}

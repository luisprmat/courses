<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /** Relationships */
    // Polymorphic
    public function commentable()
    {
        return $this->morphTo();
    }

    // One To Many (inverse)
    public function user()
    {
        return $this->belongsTo(User::class);
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

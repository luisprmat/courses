<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const LIKE = 1;
    const DISLIKE = 2;

    /** Relationships */
    // One To Many (inverse)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polymorphic
    public function reactionable()
    {
        return $this->morphTo();
    }
}

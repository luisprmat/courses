<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /** Relationships */
    // One To Many
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // One To Many (inverse)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

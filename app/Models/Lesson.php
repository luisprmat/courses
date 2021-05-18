<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    /** Relationships */
    // One To One (inverse)
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

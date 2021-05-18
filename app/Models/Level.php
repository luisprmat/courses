<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    /** Relationships */
    // One To Many
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}

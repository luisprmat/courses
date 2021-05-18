<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /** Relationships */
    // One To One (inverse)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

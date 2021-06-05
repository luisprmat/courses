<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'rating', 'user_id'];

    /** Relationships */
    // One To Many (inverse)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // One To Many (inverse)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

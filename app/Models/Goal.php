<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /** Relationships */
    // One To Many (inverse)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

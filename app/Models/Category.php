<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /** Relationships */
    // One To Many
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}

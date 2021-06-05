<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value'];

    /** Relationships */
    // One To Many
    public function course()
    {
        return $this->hasMany(Course::class);
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        return $course->status == Course::PUBLISHED;
    }

    public function dictated(User $user, Course $course)
    {
        return $course->user_id == $user->id;
    }

    public function revision(User $user, Course $course)
    {
        return $course->status == Course::REVISION;
    }

    public function valued(User $user, Course $course)
    {
        return Review::where('user_id', $user->id)->where('course_id', $course->id)->count() == 0;
    }
}

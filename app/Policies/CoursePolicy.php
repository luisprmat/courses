<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
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
}

<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory()->count(60)->create();

        foreach ($courses as $course) {
            Review::factory(rand(2,6))->create([
                'course_id' => $course->id
            ]);

            Image::factory()->create([
                'imageable_id' => $course->id,
                'imageable_type' => Course::class
            ]);

            Requirement::factory(rand(3,5))->create(['course_id' => $course->id]);
            Goal::factory(rand(3,5))->create(['course_id' => $course->id]);
            Audience::factory(rand(3,5))->create(['course_id' => $course->id]);
            $sections = Section::factory(rand(3,5))->create(['course_id' => $course->id]);

            foreach ($sections as $section) {
                $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);

                foreach ($lessons as $lesson) {
                    Description::factory()->create(['lesson_id' => $lesson->id]);
                }
            }
        }
    }
}

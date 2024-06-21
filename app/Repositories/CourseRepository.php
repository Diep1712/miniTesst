<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository implements CourseRepositoryInterface
{
    public function all()
    {
        return Course::all();
    }

    public function find($id)
    {
        return Course::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }
}

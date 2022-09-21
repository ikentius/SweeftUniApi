<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseCollection;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __invoke()
    {
        return new CourseCollection(Course::with('subjects')->get());
    }
}

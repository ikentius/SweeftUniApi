<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->sentence(5),
            'major_id'=> Major::all()->random(),
            'course_id'=>Course::all()->random(),
            'lecturer_id'=>Lecturer::all()->random(),
            'mandatory' => fake()->boolean()
        ];
    }
}

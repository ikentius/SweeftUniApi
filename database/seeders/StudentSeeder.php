<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Database\Factories\StudentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();

        foreach(Student::all() as $student)
        {
            $subjects = Subject::inRandomOrder()->where('major_id',$student->major_id)
                ->where('course_id',$student->course_id)
                ->take(rand(1,3))
                ->pluck('id');
            $student->subjects()->attach($subjects);
        }
    }


}

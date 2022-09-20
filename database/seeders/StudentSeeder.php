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
            $subjects = Subject::inRandomOrder()->take(rand(1,2))->pluck('id');
            $student->subjects()->attach($subjects);
        }
    }


}

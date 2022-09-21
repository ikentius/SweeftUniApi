<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Major;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $majors = ['Computer Science', 'International Relationships','Psychology', 'Literature', 'Architecture', 'Civil Engineering'];
        $courses = ['I','II','III','IV'];

        foreach ($majors as $major)
        {
            Major::factory()->count(1)->create(['name' =>$major]);
        }


        foreach ($courses as $course)
        {
            Course::factory()->create(['name' => $course]);
        }

        User::factory()->create(['email' => 'bestAdmin@gmail.com' , 'password' => Hash::make('option123'), 'status'=>'s']);

        $this->call([
            LecturerSeeder::class,
            StudentSeeder::class
        ]);

    }
}

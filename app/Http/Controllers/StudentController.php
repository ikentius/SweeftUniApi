<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentResource::collection(Student::with('user', 'major', 'course', 'subjects')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStudentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $user = User::create($request->validated());
        Student::create([
            'user_id' => $user->id,
            'major_id' => $request->major_id,
            'course_id' => $request->course_id
        ]);

        return response('Success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student->load(['user', 'major', 'course', 'subjects.lecturer.user']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateStudentRequest $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->user()->update($request->except(['major_id','course_id']));
        $student->update($request->only(['major_id','course_id']));

        return response('Success',200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}

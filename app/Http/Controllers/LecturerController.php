<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Http\Resources\LecturerCollection;
use App\Http\Resources\LecturerResource;
use App\Models\Lecturer;
use App\Models\User;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LecturerCollection(Lecturer::with('user','subjects')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLecturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLecturerRequest $request)
    {
        $user = User::create($request->validated());
        Lecturer::create([
            'user_id' => $user->id,
            'bank_account' => $request->bank_account,
            'level' => $request->level
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        return new LecturerResource($lecturer->load(['user', 'subjects']));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLecturerRequest  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLecturerRequest $request, Lecturer $lecturer)
    {
        $lecturer->user()->update($request->except(['bank_account','level']));
        $lecturer->update($request->only(['bank_account','level']));

        return response('Success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Lecturer $lecturer)
    {
        $lecturer->user()->update(['active' => false]);

        return response('Success',200);
    }
}

<?php

namespace app\Http\Controllers;

use app\Http\Resources\Subjects as SubjectsResource;
use app\Http\Resources\TeacherSubjects as TeacherSubjectsResource;
use app\Student;
use app\Subject;
use app\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if (Student::where('user_id', $user->id)->exists()) {
            $subjects = Subject::where('group_id', auth()->user()->student->group_id)
                ->orderBy('pass_type')
                ->with('lecturer', 'practicer', 'lab', 'lesson')
                ->get();

            return new SubjectsResource($subjects);
        } elseif (Teacher::where('user_id', $user->id)->exists()) {
            $subjects = Subject::where('lecturer_id', $user->teacher->id)
                ->orWhere('practicer_id', $user->teacher->id)
                ->orWhere('lab_id', $user->teacher->id)
                ->orderBy('group_id')
                ->with('lesson', 'group', 'lesson')
                ->get();
            return new TeacherSubjectsResource($subjects);
        } else {
            return response()->json(['message' => ['You don`t have access']], 403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

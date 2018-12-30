<?php

namespace app\Http\Controllers;

use app\Http\Resources\Shedules as ShedulesResource;
use app\Http\Resources\TeacherShedules as TeacherShedulesResource;
use app\Shedule;
use app\Student;
use app\Teacher;
use Illuminate\Http\Request;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Getting the shedule for user
        try {
            $user = auth()->user();

            if (Student::where('user_id', $user->id)->exists()) {

                $shedules = Shedule::where('group_id', $user->student->group_id)
                    ->orderBy('day_id')
                    ->orderBy('time')
                    ->with('day', 'teacher', 'building')
                    ->get();
                $grupped = $shedules->groupBy('day_id');
                return new ShedulesResource($grupped);

            } elseif (Teacher::where('user_id', $user->id)->exists()) {
                $shedules = Shedule::where('teacher_id', $user->teacher->id)
                    ->orderBy('day_id')
                    ->orderBy('time')
                    ->with('day', 'teacher', 'building','group')
                    ->get();

                $grupped = $shedules->groupBy('day_id');
                return new TeacherShedulesResource($grupped);

            } else {
                return response()->json(['message' => ['You don`t have access']], 403);
            }
        } catch (\Exception $e) {
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

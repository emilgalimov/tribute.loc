<?php

namespace app\Http\Controllers;

use app\Chat;
use app\Subject;
use app\Student;
use app\Teacher;
use app\Http\Resources\Chat as ChatResource;
use Illuminate\Http\Request;
use app\Message;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        $group_id;
        $teacher_id;

        $user = auth()->user();
        if (Student::where('user_id', $user->id)->exists()) {
            $group_id=$user->student->group_id;
            $teacher_id=$id;

        } elseif (Teacher::where('user_id', $user->id)->exists()) {
            $group_id=$id;
            $teacher_id=$user->teacher->id;
        } else {
            return response()->json(['message' => ['You don`t have access']], 403);
        }



        

            if(!Chat::where('teacher_id',$teacher_id)->where('group_id',$group_id)->exists()){
                if(Subject::where('group_id',$group_id)
                            ->where(function($query) use ($teacher_id)
                            {
                                $query->orWhere('lecturer_id',$teacher_id)
                                    ->orWhere('lab_id',$teacher_id)
                                    ->orWhere('practicer_id',$teacher_id);
                            }
                            )->exists()){
                $chat= new Chat;
                $chat->teacher_id=$teacher_id;
                $chat->group_id= $group_id;
                $chat->save();
                }else{
                   return response()->json(['message' => ['You don`t have access to this chat']], 403);
                }
            }

            $chat = Chat::where('group_id', $group_id)
                ->where('teacher_id', $teacher_id)
                ->with('messages.user', 'teacher', 'group')
                ->first();
                return new ChatResource($chat);

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

        $group_id;
        $teacher_id;

        $user = auth()->user();
        if (Student::where('user_id', $user->id)->exists()) {
            $group_id=$user->student->group_id;
            $teacher_id=$id;

        } elseif (Teacher::where('user_id', $user->id)->exists()) {
            $group_id=$id;
            $teacher_id=$user->teacher->id;
        } else {
            return response()->json(['message' => ['You don`t have access']], 403);
        }


        $chat=Chat::where('teacher_id',$teacher_id)->where('group_id',$group_id);
        if(!$chat->exists()){
            return response()->json(['message' => ['You don`t have access to this chat']], 403);
        }

        $message = new Message;
        $message->chat_id=$chat->first()->id;
        $message->user_id=$user->id;
        $message->text=$request->text;
        $message->save();
        broadcast(new \app\Events\ExampleEvent($message));
        return response()->json(['message' => ['send']], 200);
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

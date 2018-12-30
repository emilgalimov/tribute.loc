<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
 */
use app\Chat;
use app\Student;
use app\Teacher;

Broadcast::channel('chat-room.{id}', function ($user, $id) {

    $group_id;
    $teacher_id;

    $user = auth()->user();

    if (Student::where('user_id', $user->id)->exists()) {
        $group_id = $user->student->group_id;
       

        $chat = Chat::where('id', $id)->where('group_id', $group_id);
        if ($chat->exists()) {
            return true;
        } 
    } elseif (Teacher::where('user_id', $user->id)->exists()) {
        $teacher_id = $user->teacher->id;

        $chat = Chat::where('teacher_id', $teacher_id)->where('id', $id);
        if ($chat->exists()) {
            return true;
        } 
    } else {
        return response()->json(['message' => ['You don`t have access']], 403);
    }

});

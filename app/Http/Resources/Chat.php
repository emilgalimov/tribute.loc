<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Chat extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        return [
            'user'=>auth()->user()->id,
            'teacher' => $this->teacher->firstname.' '.$this->teacher->middlename,
            'group'=> $this->group->name,
            'messages' => Message::collection($this->messages),
        ];

    }
    public function with($request)
    {
        return [
            'links' => [
                'self' => route('chat.show',['chat'=>$this->id]),
                'chat_id'=>$this->id
            ],
        ];
    }
}

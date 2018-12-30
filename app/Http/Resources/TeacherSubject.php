<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherSubject extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pass_type' => isset($this->pass_type) ? $this->pass_type : 'pass type unset',
            'lesson' => $this->lesson->name,
            'teachers' => [
                '' => new Group($this->group)
            ],
        ];
    }

   
}

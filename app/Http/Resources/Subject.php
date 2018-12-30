<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Subject extends JsonResource
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
                'lecturer' => isset($this->lecturer->lastname) ? new Teacher($this->lecturer) : null,
                'practicer' => isset($this->practicer->lastname) ? new Teacher($this->practicer) : null,
                'lab' => isset($this->lab->lastname) ? new Teacher($this->lab) : null,
            ],
        ];
    }
    public function with($request)
    {
        return [
            'links' => [
                'self' => route('subject.index'),
            ],
        ];
    }
}

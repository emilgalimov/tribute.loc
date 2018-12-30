<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeacherSubjects extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' =>[
                'subject'=>TeacherSubject::collection($this->collection),
            ]
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

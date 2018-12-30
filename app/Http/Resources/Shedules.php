<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Shedules extends ResourceCollection
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
                'shedule'=>Shedule::collection($this->collection),
            ]
        ];
 
        
    }
    public function with($request)
    {
        return [
            'links' => [
                'self' => route('shedule.index'),
            ],
        ];
    }
}

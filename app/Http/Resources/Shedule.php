<?php

namespace app\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shedule extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $newer = [];
        $day = true;
        foreach ($this->resource as $item) {
            array_push($newer, [
                'id'=>$item->id,
                'lesson' => $item->lesson->name,
                'time' => $item->time,
                'room' => $item->room,
                'building'=>isset($item->building->name) ? $item->building->name : null,
                'teacher_name'=> isset($item->teacher->lastname) ? $item->teacher->lastname : null,
                'work_type'=>$item->work_type,
                'days'=>$item->days

            ]);
            if ($day===true) {
                $day = $item->day->name;
            }
        }
        return [
            'day' => $day,
            'day_shedule' => $newer,
        ];

    }
}

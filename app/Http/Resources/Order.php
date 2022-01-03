<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'id' => $this->id ,
            'description' => $this->description ,
            'location' => $this->location,
            'longitude' => $this->longitude ,
            'latitude' => $this->latitude ,
            'phone' =>$this->phone ,
            'start_time' => $this->start_time ,
            'end_time' => $this->end_time ,
            'status' => $this->status_type,
            'phone_delivery	' => $this->phone_delivery,
            'type' => $this->order_type
        ];
    }
}

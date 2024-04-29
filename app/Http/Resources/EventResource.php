<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Capa de trasformacion 
        return[
            'id' => $this->id, 
            'event_name' => $this->event_name, 
            'start_date' => $this->start_date, 
            'end_date' => $this->end_date, 
            'description' => $this->description, 
            'user_id' => $this->user_id, 
        ];
    }
}

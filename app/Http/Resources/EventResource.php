<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        return [
            'id' => $this->id,
            'event_name' => $this->event_name,
            'date'  => Carbon::parse($this->date)->format('Y-m-d'),
            'location' => $this->location,
            'time' => date('H:i', strtotime($this->time)), // Formatear a HH:MM
            'description' => nl2br(e($this->description)),
            'user_id' => $this->user_id,
        ];
    }
}

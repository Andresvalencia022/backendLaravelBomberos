<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WinningticketResource extends JsonResource
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
            'winning_number' => $this->winning_number, 
            'description' => nl2br(e($this->description)), 
            'phone' => $this->phone, 
            'winning_name' => $this->winning_name, 
            'game_date' => Carbon::parse($this->game_date)->format('Y-m-d'),
        ];
    }
}

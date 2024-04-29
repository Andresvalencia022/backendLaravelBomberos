<?php

namespace App\Http\Resources;

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
            'description' => $this->description, 
            'winning_name' => $this->winning_name, 
            'game_date' => $this->game_date, 
        ];
    }
}

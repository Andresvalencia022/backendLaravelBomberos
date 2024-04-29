<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'title_news' => $this->title_news, 
            'info' => $this->info, 
            'name_image' => $this->name_image, 
            'video_name' => $this->video_name, 
            'user_id' => $this->user_id, 
        ];
    }
}

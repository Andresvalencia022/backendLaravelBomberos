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
            'info' => nl2br(e($this->info)), 
            'name_imagen' => $this->name_imagen ? url('storage/images/' . $this->name_imagen) : null, 
            'video_name' => $this->video_name, 
            'user_id' => $this->user_id, 
            'user_name' => $this->user->name ?? 'Usuario desconocido', // nombre del usuario
        ];
    }
}

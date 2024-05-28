<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name, 
            'last_name' => $this->last_name, 
            'phone' => $this->phone, 
            'email' => $this->email, 
            'password' => $this->password, 
            'post' => $this->post, 
            'state' => $this->state, 
            'email_verified_at'=> $this->email_verified_at,
            'remember_token'=> $this->remember_token,
        ];
    }
}

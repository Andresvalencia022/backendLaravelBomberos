<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        return UserResource::collection(User::latest()->paginate(5));
    }

    public function update (Request $request, User $User ){
        // Actualizar registro
         $User->update($request->only([
            'name',
            'last_name',
            'phone',
            'post', 
            'state',
          ]));
        
          return new UserResource($User);
        
    }
}

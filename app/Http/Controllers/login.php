<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Login extends Controller
{
    public function login (Request $request){
        
        $this->validateLogin($request);
        
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'token' => $request->user()->createToken('my-token-name')->plainTextToken,
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ], 401);

    }

   public function validateLogin (Request $request){
    
    $request->validate([
        'email' => 'required|email',   
        'password' => 'required'
    ]);
   } 

   public function check_in (Request $request){
    //    $request->validate([
    //        'name' => 'required',   
    //        'last_name' => 'required',   
    //        'phone' => 'required',   
    //        'post' => 'required',   
    //        'email' => 'required|email|unique:users',   
    //        'password' => 'required|min:10',
    //        'password_confirm' => 'required|same:password|min:10'
    //   ]);
    $validator = Validator::make($request->all(), [
        'name' => 'required',   
        'last_name' => 'required',   
        'phone' => 'required',   
        'post' => 'required',   
        'email' => 'required|email|unique:users',   
        'password' => 'required|min:10',
        'password_confirm' => 'required|same:password|min:10'
    ]);
       
    // Verificar si la validación falla
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
     
    //devolvemos un recurso Product basado en el Product recién creado.
    //  Crear una nuevo Product y lo conserva en la base de datos.
     $User = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => $request->password,
        'post' => $request->post,
        'email_verified_at' => now(),
        'remember_token' => str::random(10)
    ]);

    return new UserResource($User);
    } 

}

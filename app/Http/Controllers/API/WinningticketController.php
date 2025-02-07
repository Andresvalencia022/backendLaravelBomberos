<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WinningticketResource;
use App\Models\Winningticket;
use Illuminate\Http\Request;

class WinningticketController extends Controller
{

     
    public function index(){
        return WinningticketResource::collection(Winningticket::latest()->paginate(5));
    }


      //Registrar  
      public function store(Request $request)
      {
          //Crear una nuevo Product y lo conserva en la base de datos.
          $Winningticket = Winningticket::create([
              'winning_number' => $request->winning_number,
              'description' => $request->description,
              'phone' => $request->phone,
              'winning_name' => $request->winning_name,
              'game_date' => $request->game_date
          ]);
  
          //devolvemos un recurso Product basado en el Product recién creado.
          return new WinningticketResource($Winningticket);
      }
  
  
      public function show(Winningticket $Winningticket)
      {
          //Busca un registro
          return new WinningticketResource($Winningticket);
      }
  
  
      // Actualizar 
      public function update(Request $request, Winningticket $Winningticket)
      {
          //Actualizar registro
          $Winningticket->update($request->only([
            'winning_number',
            'description',
            'phone',
            'winning_name',
            'game_date',
          ]));
  
          return new WinningticketResource($Winningticket);
      }
  
      //Eliminar
      public function destroy(Winningticket  $Winningticket)
      {
          // Si la eliminación tiene éxito, el método delete() devuelve true y entra a la condicion
          if ($Winningticket->delete()) {
              return response()->json([ //se devuelve una respuesta JSON con un código de estado HTTP 204  de éxito
                  'message' => 'Success'
              ], 204);
          }
          // devuelve una respuesta JSON con un código de estado HTTP 404 (Not Found) para indicar que el recurso no se encontró.
          return response()->json([
              'message' => 'Not found'
          ], 404);
      }
      
  }


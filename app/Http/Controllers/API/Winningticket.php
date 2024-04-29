<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WinningticketResource;
use App\Models\Winningticket as ModelsWinningticket;
use Illuminate\Http\Request;

class Winningticket extends Controller
{
      //Registrar  
      public function store(Request $request)
      {
          //Crear una nuevo Product y lo conserva en la base de datos.
          $Winningticket = ModelsWinningticket::create([
              'winning_number' => $request->winning_number,
              'description' => $request->description,
              'winning_name' => $request->winning_name,
              'game_date' => $request->game_date
          ]);
  
          //devolvemos un recurso Product basado en el Product recién creado.
          return new WinningticketResource($Winningticket);
      }
  
  
      public function show(ModelsWinningticket $ModelsWinningticket)
      {
          //Busca un registro
          //Se crea una nueva instancia 
          return new WinningticketResource($ModelsWinningticket);
      }
  
  
      // Actualizar 
      public function update(Request $request, ModelsWinningticket $ModelsWinningticket)
      {
          //Actualizar registro
          $ModelsWinningticket->update($request->only([
            'winning_number',
            'description',
            'winning_name',
            'game_date',
          ]));
  
          return new WinningticketResource($ModelsWinningticket);
      }
  
      //Eliminar
      public function destroy(ModelsWinningticket  $ModelsWinningticket)
      {
          // Si la eliminación tiene éxito, el método delete() devuelve true y entra a la condicion
          if ($ModelsWinningticket->delete()) {
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


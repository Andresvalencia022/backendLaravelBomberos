<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event as ModelsEvent;
use Illuminate\Http\Request;

class Event extends Controller
{
    // public function all (){
    //     return EventResource::collection(ModelsEvent::latest()->paginate(5))
    // }

    //Registrar
    public function store(Request $request)
    {
       //Crear una nuevo Product y lo conserva en la base de datos.
       $Event = ModelsEvent::create([
        'event_name' => $request->event_name,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'description' => $request->description,
        'user_id' => $request->user_id,
      ]);

       //devolvemos un recurso Product basado en el Product recién creado.
      return new EventResource($Event);
    }
    

    public function show(ModelsEvent $ModelsEvent)
    {
       //Busca un registro
       //Se crea una nueva instancia 
       return new EventResource($ModelsEvent);
    }


    // Actualizar 
    public function update(Request $request, ModelsEvent $ModelsEvent)
    {
        //Actualizar registro
        $ModelsEvent->update($request->only([
            'event_name',
            'start_date',
            'end_date',
            'description',
            'user_id'
        ]));

        return new EventResource($ModelsEvent);
    }
     
    //Eliminar
    public function destroy( ModelsEvent  $ModelsEvent)
    {
        // Si la eliminación tiene éxito, el método delete() devuelve true y entra a la condicion
     if ($ModelsEvent->delete()) {
        return response()->json([//se devuelve una respuesta JSON con un código de estado HTTP 204  de éxito
            'message' => 'Success'
        ],204);
    }
    // devuelve una respuesta JSON con un código de estado HTTP 404 (Not Found) para indicar que el recurso no se encontró.
    return response()->json([
        'message' => 'Not found'
    ],404);

    }


}

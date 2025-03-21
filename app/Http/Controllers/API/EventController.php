<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;

class EventController  extends Controller
{
    public function index(){
        return EventResource::collection(Event::latest()->paginate(5));
    }

    //Registrar
    public function store(Request $request)
    {
       //Crear una nuevo Product y lo conserva en la base de datos.
       $Event = Event::create([
        'event_name' => $request->event_name,
        'date' => $request->date,
        'Location' => $request->Location,
        'description' => $request->description,
        'time' => $request->time,
        'user_id' => $request->user_id,
      ]);
       //devolvemos un recurso Product basado en el Product recién creado.
      return new EventResource($Event);
    }
    
    public function show(Event $event)
    {
       //Busca un registro
       return new EventResource($event);
    }

    // Actualizar 
    public function update(Request $request, Event $event)
    {

          // Debugging: Verificar el modelo recibido
        logger()->info('Event model before update:', $event->toArray());

        // Actualizar registro
        $event->update($request->only([
            'event_name',
            'date',
            'Location',
            'time',
            'description',
            'user_id',
        ]));

        return new EventResource($event);
    }
     
    //Eliminar
    public function destroy(Event  $event)
    {
        // Si la eliminación tiene éxito, el método delete() devuelve true y entra a la condicion
     if ($event->delete()) {
        return response()->json([//se devuelve una respuesta JSON con un código de estado HTTP 204  de éxito
            'message' => 'Success'
        ],204);
    }
    // devuelve una respuesta JSON con un código de estado HTTP 404 (Not Found) para indicar que el recurso no se encontró.
    return response()->json([
        'message' => 'Not found'
    ],404);

    }

    public function publicEvent(){
        return EventResource::collection(Event::latest()->paginate(2));
    } 

    //Buscar Evento publico
    public function showPublicEvent($id)
    {

           // Busca el registro en la base de datos
           $event = Event::find($id);

           if (!$event) {
               return response()->json([
                   'message' => 'Evento no encontrado'
               ], 404);
           }

       return new EventResource($event);
    }


}

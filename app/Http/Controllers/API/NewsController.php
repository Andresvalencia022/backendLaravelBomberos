<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{


    public function index(){
        return NewsResource::collection(News::latest()->paginate(5));
    }

    //Registrar  
    public function store(Request $request)
    {
        //Crear una nuevo Product y lo conserva en la base de datos.
        $News = News::create([
            'title_news' => $request->title_news,
            'info' => $request->info,
            'name_image' => $request->name_image,
            'video_name' => $request->video_name,
            'user_id' => $request->user_id,
        ]);

        //devolvemos un recurso Product basado en el Product recién creado.
        return new NewsResource($News);
    }


    // public function show(ModelsNews $ModelsNews)
    // {
    //     //Busca un registro
    //     //Se crea una nueva instancia 
    //     return new NewsResource($ModelsNews);
    // }


    // Actualizar 
    public function update(Request $request, News $news)
    {
        //Actualizar registro
        $news->update($request->only([
            'title_news',
            'info',
            'name_image',
            'video_name',
            'user_id',
        ]));

        return new NewsResource($news);
    }

    //Eliminar
    public function destroy( News $news)
    {
        // Si la eliminación tiene éxito, el método delete() devuelve true y entra a la condicion
        if ($news->delete()) {
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

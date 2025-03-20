<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{


    public function index()
    {
        return NewsResource::collection(News::with('user')->latest()->paginate(5));
    }

    //Registrar  
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'title_news' => 'required|string|max:255',
            'info' => 'required|string',
            'name_imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_name' => 'nullable|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $imageName = null;

        // Manejo de la imagen
        if ($request->hasFile('name_imagen')) {
            $image = $request->file('name_imagen');
            $imageName = time() . '.' . $image->extension();


            // Obtener el disco 'public'
            $disk = Storage::disk('public');

            // Crear el directorio 'images' si no existe
            if (!$disk->exists('images')) {
                $disk->makeDirectory('images');
            }

            // Almacenar la imagen en el disco 'public'
            $disk->putFileAs('images', $image, $imageName);
        }



        //         //Crear una nuevo Product y lo conserva en la base de datos.
        $News = News::create([
            'title_news' => $request->title_news,
            // reemplazar todos los saltos de línea tipo \r\n por \n antes de guardarlos en la base de datos.
            'info' => str_replace("\r\n", "\n", $request->info),
            'name_imagen' => $imageName,
            'video_name' => $request->video_name,
            'user_id' => $request->user_id,
        ]);



        //devolvemos un recurso Product basado en el Product recién creado.
        return new NewsResource($News);
    }


    public function show(News $news)
    {
        //Busca un registro
        //Se crea una nueva instancia 
        return new NewsResource(resource: $news);
    }


    // Actualizar 
    public function update(Request $request, News $news)
    {

        $request->validate([
            'title_news' => 'required|string|max:255',
            'info' => 'required|string',
            'name_imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_name' => 'nullable|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($request->hasFile('name_imagen')) {
            $image = $request->file('name_imagen');
            $imageName = time() . '.' . $image->extension();

            // Obtener el disco 'public'
            $disk = Storage::disk('public');
            // Obtener el nombre del archivo de la BD
            $nameimagen_bd = $news->name_imagen;
            $file_path = "images/" . $nameimagen_bd;

            if ($disk->exists($file_path)) {
                //Elimina el archivo del disk
                $disk->delete($file_path);
            }

            $disk->putFileAs('images', $image, $imageName);
            // Actualizar el campo 'name_imagen' con el nuevo nombre de la imagen
            $news->update([
                'title_news' => $request->title_news,
                'info' => str_replace("\r\n", "\n", $request->info), // Reemplaza \r\n por \n
                'name_imagen' => $imageName, // Aquí se usa la variable
                'video_name' => $request->video_name,
                'user_id' => $request->user_id,
            ]);
        } else {
            // Actualizar registro
            $news->update($request->only([
                'title_news',
                'info',
                'video_name',
                'user_id'
            ]));
        }
        return new NewsResource($news);
    }


    //Eliminar
    public function destroy(News $news)
    {
        // Obtener el disco 'public'
        $disk = Storage::disk('public');
        $nameimage = $news->name_imagen;
        $file_path = "images/" . $nameimage;

        if ($disk->exists($file_path)) {
            //Elimina el archivo del disk
            $disk->delete($file_path);
        }

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

    public function publicNews()
    {
        return NewsResource::collection(News::latest()->paginate(2));
    }

    //Buscar News publico
    public function showPublicNews($id)
    {
        // Busca el registro en la base de datos
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'message' => 'Noticia no encontrada'
            ], 404);
        }

        return new NewsResource($news);
    }
}

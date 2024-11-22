<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

    
    class Noticia2Controller extends Controller
    {
        public function index(Request$request)
    {
       $buscar = $request->input('buscar');

        $noticias = Noticia::query()
        ->when($buscar, function ($query, $buscar) {
            return $query->where ('nombre_noticia', 'LIKE', "%{$buscar}%")
            -> orWhere ('descripcion_noticia', 'LIKE', "%{$buscar}%");

        }) 
        ->paginate(10);

        return view('noticias2.index', compact('noticias'));
    }

//ver noticias en show
public function show($id)
{
    $noticia = Noticia::findOrFail($id);
    return view('noticias2.show', compact('noticia'));
}
    }


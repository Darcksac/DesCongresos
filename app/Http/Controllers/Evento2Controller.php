<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

    
    class Evento2Controller extends Controller
    {
        //ver eventos en index eventos2
        public function index(Request$request)
    {
       $buscar = $request->input('buscar');

        $eventos = Evento::query()
        ->when($buscar, function ($query, $buscar) {
            return $query->where ('nombre_evento', 'LIKE', "%{$buscar}%")
            -> orWhere ('descripcion_evento', 'LIKE', "%{$buscar}%");

        }) 
        ->orderBy('created_at', 'desc')
        ->get();
        return view('eventos2.index', compact('eventos'));
    }

//ver eventos en show
public function show($id)
{
    $evento = Evento::findOrFail($id);
    return view('eventos2.show', compact('evento'));
}
}

    


<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Noticia;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(Request $request) 
    {
        
        $buscar = $request->input('buscar');
    
    
    if ($buscar) {
        
        $eventos = Evento::where('nombre_evento', 'like', "%$buscar%")
                        ->orWhere('descripcion_evento', 'like', "%$buscar%")
                        ->get();
        
        
        $noticias = Noticia::where('nombre_noticia', 'like', "%$buscar%")
                           ->orWhere('descripcion_noticia', 'like', "%$buscar%")
                           ->get();
    } else {
        
        $eventos = Evento::all();
        $noticias = Noticia::all();
    }

    return view('inicio', compact('noticias', 'eventos'));
}}

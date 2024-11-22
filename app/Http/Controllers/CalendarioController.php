<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;


class CalendarioController extends Controller
{
   



    public function index(Request $request)
    {
       
        $eventos = Evento::all(); 
    
       
        $noticias = Noticia::all(); 
    
        return view('welcome', compact('eventos', 'noticias'));
    }
}
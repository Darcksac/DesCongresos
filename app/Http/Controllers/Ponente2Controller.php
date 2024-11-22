<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;

class Ponente2Controller extends Controller
{
    public function index(Request$request)
    {
       $buscar = $request->input('buscar');

        $ponentes = Ponente::query()
        ->when($buscar, function ($query, $buscar) {
            return $query->where ('nombre_ponente', 'LIKE', "%{$buscar}%")
            -> orWhere ('origen_ponente', 'LIKE', "%{$buscar}%");

        }) 
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('ponentes2.index', compact('ponentes'));
    }

    public function show($id)
    {
        
        $ponente = Ponente::findOrFail($id);

        return view('ponentes2.show', compact('ponente'));
    }
}

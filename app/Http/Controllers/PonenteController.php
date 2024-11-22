<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;

class PonenteController extends Controller
{
    public function index()
    {
        // list de pon
        $ponentes = Ponente::all();
        return view('ponentes.index', compact('ponentes'));
    }

    public function create()
    {
        // form crear regreso
        return view('ponentes.create');
    }

    public function store(Request $request)
    {
        //validacioner de carga
        $request->validate([
            'nombre_ponente' => 'required|string|max:255',
            'origen_ponente' => 'required|string|max:255',
            'curriculum' => 'nullable|string|max:10240',
            'imagen' => 'required|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        // curr sub
        //time(), que devuelve la marca de tiempo actual en segundos.
         //Esto asegura que los archivos subidos tengan nombres únicos, 
        //evitando sobrescribir archivos con el mismo nombre.


        // img sub
        $imagePath = null;
if ($request->hasFile('imagen')) {
    // Crear un nombre único basado en la fecha y hora actuales
    $imageName = now()->format('Ymd_His') . '.' . $request->imagen->extension();
    // Guardar la imagen en el almacenamiento público
    $request->imagen->storeAs('images', $imageName, 'public');
    $imagePath = $imageName;
}


        Ponente::create([
            'nombre_ponente' => $request->nombre_ponente,
            'origen_ponente' => $request->origen_ponente,
            'curriculum' => $request->curriculum, 
            'imagen' => $imagePath,
        ]);
    
       
        return redirect()->route('ponentes.index')->with('success', 'Ponente creado exitosamente.');
    }

    public function show($id)
    {
        $ponente = Ponente::findOrFail($id);
        return view('ponentes.show', compact('ponente'));
    }

    public function edit($id)
    {
        $ponente = Ponente::findOrFail($id);
        return view('ponentes.edit', compact('ponente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_ponente' => 'required|string|max:255',
            'origen_ponente' => 'required|string|max:255',
            'curriculum' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $ponente = Ponente::findOrFail($id);

        // Curri sub
        if ($request->hasFile('curriculum')) {
            $curriculumName = time().'.'.$request->curriculum->extension();
            $request->curriculum->storeAs('curriculums', $curriculumName, 'public');
            $ponente->curriculum = $curriculumName;
        }

        // Img sub
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->storeAs('images', $imageName, 'public');
            $ponente->imagen = $imageName;
        }

        // act poon
        $ponente->update([
            'nombre_ponente' => $request->nombre_ponente,
            'origen_ponente' => $request->origen_ponente,
        ]);

        return redirect()->route('ponentes.index')->with('success', 'Ponente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $ponente = Ponente::findOrFail($id);
        $ponente->delete();

        return redirect()->route('ponentes.index')->with('success', 'Ponente eliminado exitosamente.');
    }
}

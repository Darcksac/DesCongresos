<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }

    
    public function create()
    {
        return view('noticias.create');
    }

    
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre_noticia' => 'required|string|max:255|unique:noticias,nombre_noticia',
            'descripcion_noticia' => 'required|string',
            'fecha_noticia' => 'required|date',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:4800',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg,gif,jfif|max:3000'
        ]);

        // Subir la imagen
        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $rutaImagen = $request->file('imagen')->storeAs('noticias_imagenes', $nombreImagen, 'public'); }
            
             // Subir el pdf
            $pdfPath = null;
            if ($request->hasFile('archivo_pdf')) {
    $nombrePdf = time() . '.' . $request->file('archivo_pdf')->getClientOriginalExtension();
    $pdfPath = $request->file('archivo_pdf')->storeAs('pdfs', $nombrePdf, 'public'); 
}


        // Crear la noticia 
        Noticia::create([
            'nombre_noticia' => $request->nombre_noticia,
            'descripcion_noticia' => $request->descripcion_noticia,
            'fecha_noticia' => $request->fecha_noticia,
            'imagen' => $rutaImagen,
            'archivo_pdf' => $pdfPath,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia creada exitosamente.');
    }

    
    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.show', compact('noticia'));
    }

  
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('noticias.edit', compact('noticia'));
    }

    
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre_noticia' => 'required|string|max:255',
            'descripcion_noticia' => 'required|string',
            'fecha_noticia' => 'required|date',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:4800',
            'imagen' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:3000'
        ]);

        $noticia = Noticia::findOrFail($id);

        // Actualizar imagen si es cargada
        if ($request->hasFile('imagen')) {
            if ($noticia->imagen) {
                Storage::disk('public')->delete($noticia->imagen);
            }
            $noticia->imagen = $request->file('imagen')->store('noticias_imagenes', 'public');
        }

        // Actualizar PDF si es cargado
        if ($request->hasFile('archivo_pdf')) {
            if ($noticia->archivo_pdf) {
                Storage::disk('public')->delete($noticia->archivo_pdf);
            }
            $noticia->archivo_pdf = $request->file('archivo_pdf')->store('pdfs', 'public');
        }

        // Actualizar otros datos de la noticia
        $noticia->update([
            'nombre_noticia' => $request->nombre_noticia,
            'descripcion_noticia' => $request->descripcion_noticia,
            'fecha_noticia' => $request->fecha_noticia,
            'imagen' => $noticia->imagen,
            'archivo_pdf' => $noticia->archivo_pdf,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Eliminar la imagen y el archivo PDF asociados si existen
        if ($noticia->imagen) {
            Storage::disk('public')->delete($noticia->imagen);
        }
        if ($noticia->archivo_pdf) {
            Storage::disk('public')->delete($noticia->archivo_pdf);
        }

        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}

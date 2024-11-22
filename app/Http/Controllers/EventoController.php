<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with('ponentes')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $ponentes = Ponente::all();
        return view('eventos.create', compact('ponentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion_evento' => 'required|string',
            'fecha_evento' => 'required|date',
            'hora_evento' => 'required|date_format:H:i',
            'duracion_evento' => 'required|integer|min:1',
            'lugar_evento' => 'required|string|max:255',
            'imagen' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'ponentes' => 'required|array',
        ]);

        $eventoImagenPath = null;
        if ($request->hasFile('imagen')) {
            $nombreImagen = $request->file('imagen')->hashName();
            $eventoImagenPath = $request->file('imagen')->storeAs('event_images', $nombreImagen, 'public');
        }

        $evento = Evento::create([
            'nombre_evento' => $request->nombre_evento,
            'descripcion_evento' => $request->descripcion_evento,
            'fecha_evento' => $request->fecha_evento,
            'hora_evento' => $request->hora_evento,
            'duracion_evento' => $request->duracion_evento,
            'lugar_evento' => $request->lugar_evento,
            'imagen' => $eventoImagenPath ? $nombreImagen : null,
        ]);

        $evento->ponentes()->sync($request->ponentes);

        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');
    }

    public function show($id)
    {
        $evento = Evento::with('ponentes')->findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $ponentes = Ponente::all();
        return view('eventos.edit', compact('evento', 'ponentes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion_evento' => 'required|string',
            'fecha_evento' => 'required|date',
            'hora_evento' => 'required|date_format:H:i',
            'duracion_evento' => 'required|integer|min:1',
            'lugar_evento' => 'required|string|max:255',
            'imagen' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'ponentes' => 'nullable|array',
        ]);

        $evento = Evento::findOrFail($id);

        // Verificar si hay una nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($evento->imagen && Storage::exists('public/event_images/' . $evento->imagen)) {
                Storage::delete('public/event_images/' . $evento->imagen);
            }

            // Guardar la nueva imagen
            $nombreImagen = $request->file('imagen')->hashName();
            $evento->imagen = $request->file('imagen')->storeAs('event_images', $nombreImagen, 'public');
        }

        // Actualizar otros campos
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion_evento = $request->descripcion_evento;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->hora_evento = $request->hora_evento;
        $evento->duracion_evento = $request->duracion_evento;
        $evento->lugar_evento = $request->lugar_evento;

        $evento->save();

        // Actualizar los ponentes
        if ($request->has('ponentes')) {
            $evento->ponentes()->sync($request->ponentes);
        }

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }
}

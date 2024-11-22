@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Crear Evento</h1>

        <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nombre_evento">Nombre del Evento</label>
        <input type="text" name="nombre_evento" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="descripcion_evento">Descripción del Evento</label>
        <textarea name="descripcion_evento" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="fecha_evento">Fecha del Evento</label>
        <input type="date" name="fecha_evento" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="hora_evento">Hora del Evento</label>
        <input type="time" name="hora_evento" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="duracion_evento">Duración del Evento (en horas)</label>
        <input type="number" name="duracion_evento" class="form-control" min="1" required>
    </div>
    <div class="form-group">
    <label for="lugar_evento">Lugar del Evento:</label>
    <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" value="{{ old('lugar_evento', $evento->lugar_evento ?? '') }}">
</div>
<div class="form-group">
        <label for="imagen">Imagen del Evento</label>
        <input type="file" name="imagen" class="form-control-file">
    </div>


    <div class="form-group">
        <label for="ponentes">Seleccione Ponentes</label>
        <select name="ponentes[]" class="form-control" multiple>
            @foreach($ponentes as $ponente)
                <option value="{{ $ponente->id }}">{{ $ponente->nombre_ponente }}</option>
            @endforeach
        </select>
    </div>

    <h4>Agregar Nuevo Ponente (opcional)</h4>
    <div class="form-group">
        <label for="nuevo_ponente_nombre">Nombre del Nuevo Ponente</label>
        <input type="text" name="nuevo_ponente_nombre" class="form-control">
    </div>

    <div class="form-group">
        <label for="nuevo_ponente_origen">Origen del Nuevo Ponente</label>
        <input type="text" name="nuevo_ponente_origen" class="form-control">
    </div>

    <div class="form-group">
        <label for="nuevo_ponente_curriculum">Currículum del Nuevo Ponente</label>
        <textarea name="nuevo_ponente_curriculum" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="nuevo_ponente_imagen">Imagen del Nuevo Ponente</label>
        <input type="file" name="nuevo_ponente_imagen" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-primary">Guardar Evento</button>
</form>

@endsection

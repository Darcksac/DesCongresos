@extends('adminlte::page')

@section('content')
    <h1>Editar Evento</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('eventos.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_evento">Nombre del Evento</label>
            <input type="text" name="nombre_evento" value="{{ old('nombre_evento', $evento->nombre_evento) }}" class="form-control" required>
            @error('nombre_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="descripcion_evento">Descripción del Evento</label>
            <textarea name="descripcion_evento" class="form-control" required>{{ old('descripcion_evento', $evento->descripcion_evento) }}</textarea>
            @error('descripcion_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="fecha_evento">Fecha del Evento</label>
            <input type="date" name="fecha_evento" value="{{ old('fecha_evento', $evento->fecha_evento) }}" class="form-control" required>
            @error('fecha_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="hora_evento">Hora del Evento</label>
            <input type="time" name="hora_evento" value="{{ old('hora_evento', $evento->hora_evento) }}" class="form-control" required>
            @error('hora_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="duracion_evento">Duración del Evento (en minutos)</label>
            <input type="number" name="duracion_evento" value="{{ old('duracion_evento', $evento->duracion_evento) }}" class="form-control" required>
            @error('duracion_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="lugar_evento">Lugar del Evento</label>
            <input type="text" name="lugar_evento" value="{{ old('lugar_evento', $evento->lugar_evento) }}" class="form-control" required>
            @error('lugar_evento') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Evento</label>
            <input type="file" name="imagen" class="form-control">
            @if($evento->imagen)
                <img src="{{ Storage::url('public/event_images/' . $evento->imagen) }}" width="100" alt="Imagen actual">
            @endif
            @error('imagen') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="ponentes">Ponentes</label>
            <select name="ponentes[]" class="form-control" multiple>
                @foreach ($ponentes as $ponente)
                    <option value="{{ $ponente->id }}" {{ in_array($ponente->id, old('ponentes', $evento->ponentes->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $ponente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('ponentes') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
    </form>
@endsection

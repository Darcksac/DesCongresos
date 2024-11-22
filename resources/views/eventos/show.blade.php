@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>{{ $evento->nombre_evento }}</h2>

    
    @if ($evento->imagen)
        <div class="mb-4">
            <img src="{{ asset('storage/event_images/' . $evento->imagen) }}" alt="{{ $evento->nombre_evento }}" class="img-fluid rounded" style="max-height: 300px; width: auto;">
        </div>
    @endif

    <p><strong>Descripción:</strong> {{ $evento->descripcion_evento }}</p>
    <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y') }}</p>
    <p><strong>Hora:</strong> {{ \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') }}</p>
    <p><strong>Duración:</strong> {{ $evento->duracion_evento }} horas</p>
    <p><strong>Lugar:</strong> {{ $evento->lugar_evento }} </p>

    <h4>Ponentes:</h4>
    <ul>
        @if ($evento->ponentes->isEmpty())
            <li>No hay ponentes asignados a este evento.</li>
        @else
            @foreach ($evento->ponentes as $ponente)
                <li>
                    <a href="{{ route('ponentes.show', $ponente->id) }}">
                        {{ $ponente->nombre_ponente }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>

    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection

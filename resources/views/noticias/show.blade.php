@extends('adminlte::page')


@section('content')
<div class="container">
    <h1>{{ $noticia->nombre_noticia }}</h1>

    <p><strong>Descripción:</strong> {{ $noticia->descripcion_noticia }}</p>
    <p><strong>Fecha:</strong> {{ $noticia->fecha_noticia }}</p>

    @if($noticia->imagen)
        <div>
            <strong>Imagen:</strong>
            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Imagen Noticia" width="300">
        </div>
    @endif

    @if($noticia->archivo_pdf)
        <div>
            <strong>Archivo PDF:</strong>
            <a href="{{ asset('storage/' . $noticia->archivo_pdf) }}" target="_blank">Ver PDF</a>
        </div>
    @endif

    <a href="{{ route('noticias.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection


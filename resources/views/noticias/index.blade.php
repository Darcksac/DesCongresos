@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Noticias</h1>
    <a href="{{ route('noticias.create') }}" class="btn btn-primary mb-3">Agregar Nueva Noticia</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noticias as $noticia)
            <tr>
                <td>{{ $noticia->nombre_noticia }}</td>
                <td>{{ $noticia->descripcion_noticia }}</td>
                <td>{{ \Carbon\Carbon::parse($noticia->fecha_noticia)->format('d/m/Y') }}</td>
                <td>
                    @if($noticia->imagen)
                        <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Imagen Noticia" width="100">
                    @endif
                </td>
                
                <td>
                    <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-info btn-sm">Ver</a>
                    @if($noticia->archivo_pdf)
        <div>
            <a href="{{ asset('storage/' . $noticia->archivo_pdf) }}" target="_blank">Ver PDF</a>
        </div>
    @endif
                    <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" style="display:inline;">
                        @csrf
                        
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

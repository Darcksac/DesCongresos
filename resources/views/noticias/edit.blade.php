@extends('adminlte::page')


@section('content')
<div class="container">
    <h1>Editar Noticia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_noticia">Nombre</label>
            <input type="text" name="nombre_noticia" class="form-control" value="{{ $noticia->nombre_noticia }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion_noticia">Descripción</label>
            <textarea name="descripcion_noticia" class="form-control" required>{{ $noticia->descripcion_noticia }}</textarea>
        </div>

        <div class="form-group">
            <label for="fecha_noticia">Fecha</label>
            <input type="date" name="fecha_noticia" class="form-control" value="{{ $noticia->fecha_noticia }}" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
            @if($noticia->imagen)
                <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Imagen Noticia" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="archivo_pdf">Archivo PDF</label>
            <input type="file" name="archivo_pdf" class="form-control" accept="application/pdf">
            @if($noticia->archivo_pdf)
                <a href="{{ asset('storage/pdfs/' . $noticia->archivo_pdf) }}" target="_blank">Ver PDF Actual</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Noticia</button>
    </form>
</div>
@endsection

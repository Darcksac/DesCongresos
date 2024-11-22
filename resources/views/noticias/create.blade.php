@extends('adminlte::page')



@section('content')
<div class="container">
    <h1>Crear Nueva Noticia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre_noticia">Nombre</label>
            <input type="text" name="nombre_noticia" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion_noticia">Descripción</label>
            <textarea name="descripcion_noticia" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_noticia">Fecha</label>
            <input type="date" name="fecha_noticia" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
        </div>

        <div class="form-group">
            <label for="archivo_pdf">Archivo PDF</label>
            <input type="file" name="archivo_pdf" class="form-control" accept="application/pdf">
        </div>

        <button type="submit" class="btn btn-primary">Crear Noticia</button>
    </form>
</div>
@endsection

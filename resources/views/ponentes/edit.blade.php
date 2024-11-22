@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Editar Ponente</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ponentes.update', $ponente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre_ponente" class="form-label">Nombre del Ponente</label>
                <input type="text" name="nombre_ponente" class="form-control" id="nombre_ponente" value="{{ $ponente->nombre_ponente }}">
            </div>

            <div class="mb-3">
                <label for="origen_ponente" class="form-label">Origen del Ponente</label>
                <input type="text" name="origen_ponente" class="form-control" id="origen_ponente" value="{{ $ponente->origen_ponente }}">
            </div>

            <div class="mb-3">
                <label for="curriculum" class="form-label">Currículum (opcional)</label>
                <input type="text" name="curriculum" class="form-control" id="curriculum">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen (opcional)</label>
                <input type="file" name="imagen" class="form-control" id="imagen">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection

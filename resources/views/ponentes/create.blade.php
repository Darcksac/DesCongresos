@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>Agregar Ponente</h2>

    <form action="{{ route('ponentes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        
        <div class="form-group">
            <label for="nombre_ponente">Nombre del ponente</label>
            <input type="text" class="form-control" id="nombre_ponente" name="nombre_ponente" required>
        </div>

        
        <div class="form-group">
            <label for="origen_ponente">Origen del ponente</label>
            <input type="text" class="form-control" id="origen_ponente" name="origen_ponente" required>
        </div>

       
        <div class="form-group">
            <label for="curriculum">Curriculum (Texto)</label>
            <textarea class="text" id="curriculum" name="curriculum" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del ponente</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Ponente</button>
    </form>
</div>
@endsection

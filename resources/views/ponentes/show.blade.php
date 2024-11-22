@extends('adminlte::page')

@section('content')
<div class="container">
    <h2>{{ $ponente->nombre_ponente }}</h2>
    <p><strong>Origen del ponente:</strong> {{ $ponente->origen_ponente }}</p>

    <div>
        <strong>Curriculum:</strong>
        <p>{{ $ponente->curriculum }}</p> 
    </div>

    @if ($ponente->imagen)
        <div>
            <strong>Imagen:</strong>
            <img src="{{ asset('storage/images/' . $ponente->imagen) }}" alt="Imagen del ponente" class="img-fluid" style="max-width: 200px;">
        </div>
    @endif

    <a href="{{ route('ponentes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection

@extends('adminlte::page')

@section('content')
    <h1>Lista de Eventos</h1>
    <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear Evento</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->nombre_evento }}</td>
                    <td>{{ $evento->descripcion_evento }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

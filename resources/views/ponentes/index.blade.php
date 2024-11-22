@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Lista de Ponentes</h1>
        <a href="{{ route('ponentes.create') }}" class="btn btn-primary">Añadir Ponente</a>

        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Origen</th>
                    <th>Currículum</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ponentes as $ponente)
                    <tr>
                        <td>{{ $ponente->nombre_ponente }}</td>
                        <td>{{ $ponente->origen_ponente }}</td>
                        <td>
                            @if ($ponente->curriculum)
                                <p>{{ $ponente->curriculum }}</p> 
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>
                            @if ($ponente->imagen)
                                <img src="{{ asset('storage/images/' . $ponente->imagen) }}" width="100" alt="Imagen del ponente">
                            @else
                                No disponible
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ponentes.show', $ponente->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('ponentes.edit', $ponente->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ponentes.destroy', $ponente->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

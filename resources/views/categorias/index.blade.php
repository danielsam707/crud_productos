@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nueva Categoría</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
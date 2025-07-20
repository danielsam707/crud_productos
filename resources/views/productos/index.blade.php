@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->proveedor->nombre }}</td>
                    <td>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
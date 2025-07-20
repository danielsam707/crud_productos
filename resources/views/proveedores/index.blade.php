@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>
                        <a href=" {{ route('proveedores.show', $proveedor->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href=" {{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline">
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
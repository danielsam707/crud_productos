@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detalles de Proveedores: {{ $proveedor->nombre }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5>Teléfono</h5>
                        <p>{{ $proveedor->telefono ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Dirección</h5>
                        <p>{{ $proveedor->direccion ?? 'N/A'}}</p>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
            <a href=" {{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
            </form>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
        <div class="card-footer text-muted">
            Creado: {{ $proveedor->created_at->diffForHumans() }}, 
            Actualizado: {{ $proveedor->updated_at->diffForHumans() }}
        </div>
    </div>
@endsection
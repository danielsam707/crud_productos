@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detalles del Producto: {{ $producto->nombre }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5>Descripción:</h5>
                        <p>{{ $producto->descripcion ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <h5>Precio:</h5>
                        <p>${{ number_format($producto->precio, 2) }}</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5>Stock:</h5>
                        <p>{{ $producto->stock }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <h5>Categoría:</h5>
                        <p>
                            <a href="{{ route('categorias.show', $producto->categoria_id) }}">
                                {{ $producto->categoria->nombre }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="d-flex gap-2">
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                </form>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
            
        </div>
        <div class="card-footer text-muted">
            Creado: {{ $producto->created_at->diffForHumans() }}, 
            Actualizado: {{ $producto->updated_at->diffForHumans() }}
        </div>
    </div>
@endsection  
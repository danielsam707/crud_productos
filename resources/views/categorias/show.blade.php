@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Detalles de la Categoría: {{ $categoria->nombre }}</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5>Descripción:</h5>
                <p>{{ $categoria->descripcion ?? 'N/A' }}</p>
            </div>
            
            <div class="mb-3">
                <h5>Productos en esta categoría:</h5>
                @if($categoria->productos->count() > 0)
                    <ul class="list-group">
                        @foreach($categoria->productos as $producto)
                            <li class="list-group-item">
                                <a href="{{ route('productos.show', $producto->id) }}">{{ $producto->nombre }}</a>
                                - ${{ number_format($producto->precio, 2) }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay productos en esta categoría.</p>
                @endif
            </div>
            
            <div class="d-flex gap-2">
                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</button>
                </form>
                <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
        <div class="card-footer text-muted">
            Creado: {{ $categoria->created_at->diffForHumans() }}, 
            Actualizado: {{ $categoria->updated_at->diffForHumans() }}
        </div>
    </div>
@endsection
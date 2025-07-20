@extends('layouts.app')

@section('content')
    <h1>Editar Producto: {{ $producto->nombre }}</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                   id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                      id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
                   id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                   id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-select @error('categoria_id') is-invalid @enderror" 
                    id="categoria_id" name="categoria_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
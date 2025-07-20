@extends('layouts.app')

@section('content')
    <h1>Editar Proveedores: {{ $proveedor->nombre }}</h1>

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
            id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}" require>
            @error('nombre')
                <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control @error('direccion') is-invalid @enderror"
            id="direccion" name="direccion" value="{{ old('direccion', $proveedor->direccion) }}" require>
            @error('direccion')
                <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control @error('telefono') is-invalid @enderror"
            id="telefono" name="telefono" value="{{ old('telefono', $proveedor->telefono) }}" require>
            @error('telefono')
                <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
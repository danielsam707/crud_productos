@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>

    <form action="{{ route('categorias.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                   id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                      id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    @push('scripts')
    <script>
        // Validación del formulario
        (function() {
            'use strict'
            
            const forms = document.querySelectorAll('.needs-validation')
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    @endpush
@endsection
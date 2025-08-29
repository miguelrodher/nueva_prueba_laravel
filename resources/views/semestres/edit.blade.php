@extends('layouts.app')

@section('title', 'Editar Semestre')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Editar Semestre</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('semestres.update', $semestre->id_semestre) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="clase">Semestre (escrito de forma ordinal)</label>
                    <input
                        id="semestre"
                        name="semestre"
                        type="text"
                        class="form-control @error('semestre') is-invalid @enderror"
                        value="{{ old('semestre', $semestre->semestre) }}"
                        minlength="5"
                        maxlength="15"
                        required
                        pattern="^[A-Z][a-z]+$"
                        title="Ingrese solo letras y la primera en mayúscula"
                    >
                    @error('semestre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Escrito de forma ordinal y primera letra mayúscula(ej. Primero). No se admiten números ni símbolos.</small>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('semestres.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title', 'Nuevo Turno')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Nuevo Turno</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('turnos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="turno">Turno </label>
                    <input
                        id="turno"
                        name="turno"
                        type="text"
                        class="form-control @error('turno') is-invalid @enderror"
                        value="{{ old('turno') }}"
                        minlength="8"
                        maxlength="10"
                        required
                        pattern="^[A-Z][a-z]+$"
                        title="Ingrese solo letras y la primera en mayúscula"
                    >
                    @error('turno')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Escrito con la primera letra mayúscula (ej. Matutino). No se admiten números ni símbolos.</small>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('turnos.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection

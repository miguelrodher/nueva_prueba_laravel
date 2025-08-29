@extends('layouts.app')

@section('title', 'Editar Clase')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Editar Clase</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('clases.update', $clase->id_clase) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="clase">Clase (1 letra)</label>
                    <input
                        id="clase"
                        name="clase"
                        type="text"
                        class="form-control @error('clase') is-invalid @enderror"
                        value="{{ old('clase', $clase->clase) }}"
                        maxlength="1"
                        required
                        pattern="[A-Z]"
                        title="Ingrese una sola letra (A-Z)."
                        style="text-transform:uppercase;"
                    >
                    @error('clase')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Sólo una letra (ej. A). No se admiten números ni símbolos.</small>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('clases.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection

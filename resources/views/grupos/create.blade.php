@extends('layouts.app')

@section('title', 'Nuevo Grupo')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Nuevo Grupo</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('grupos.store') }}" method="POST" novalidate>
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="id_clase">Clase</label>
                        <select id="id_clase" name="id_clase" class="form-control @error('id_clase') is-invalid @enderror" required>
                            <option value="">-- Selecciona una clase --</option>
                            @foreach($clases as $clase)
                                <option value="{{ $clase->id_clase }}" {{ old('id_clase') == $clase->id_clase ? 'selected' : '' }}>
                                    {{ $clase->clase }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_clase') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_turno">Turno</label>
                        <select id="id_turno" name="id_turno" class="form-control @error('id_turno') is-invalid @enderror" required>
                            <option value="">-- Selecciona un turno --</option>
                            @foreach($turnos as $turno)
                                <option value="{{ $turno->id_turno }}" {{ old('id_turno') == $turno->id_turno ? 'selected' : '' }}>
                                    {{ $turno->turno }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_turno') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_semestre">Semestre</label>
                        <select id="id_semestre" name="id_semestre" class="form-control @error('id_semestre') is-invalid @enderror" required>
                            <option value="">-- Selecciona un semestre --</option>
                            @foreach($semestres as $semestre)
                                <option value="{{ $semestre->id_semestre }}" {{ old('id_semestre') == $semestre->id_semestre ? 'selected' : '' }}>
                                    {{ $semestre->semestre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_semestre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Guardar Grupo</button>
                    <a href="{{ route('grupos.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Editar Grupo</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('grupos.update', $grupo->id_grupo) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="id_clase">Clase</label>
                        <select id="id_clase" name="id_clase" class="form-control @error('id_clase') is-invalid @enderror" required>
                            <option value="">-- Selecciona una clase --</option>
                            @foreach($clases as $cl)
                                <option value="{{ $cl->id_clase }}"
                                    {{ (old('id_clase', $grupo->id_clase) == $cl->id_clase) ? 'selected' : '' }}>
                                    {{ $cl->clase }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_clase') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_turno">Turno</label>
                        <select id="id_turno" name="id_turno" class="form-control @error('id_turno') is-invalid @enderror" required>
                            <option value="">-- Selecciona un turno --</option>
                            @foreach($turnos as $t)
                                <option value="{{ $t->id_turno }}"
                                    {{ (old('id_turno', $grupo->id_turno) == $t->id_turno) ? 'selected' : '' }}>
                                    {{ $t->turno }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_turno') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_semestre">Semestre</label>
                        <select id="id_semestre" name="id_semestre" class="form-control @error('id_semestre') is-invalid @enderror" required>
                            <option value="">-- Selecciona un semestre --</option>
                            @foreach($semestres as $s)
                                <option value="{{ $s->id_semestre }}"
                                    {{ (old('id_semestre', $grupo->id_semestre) == $s->id_semestre) ? 'selected' : '' }}>
                                    {{ $s->semestre }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_semestre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Grupo</button>
                    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

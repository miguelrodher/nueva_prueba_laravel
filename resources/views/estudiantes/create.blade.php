@extends('layouts.app')

@section('title', 'Nuevo Estudiante')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Nuevo Estudiante</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('estudiantes.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nombre">Nombre</label>
                        <input 
                            id="nombre" 
                            name="nombre" 
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') }}"
                            required
                            minlength="3" 
                            maxlength="20" 
                            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s\-']+$"
                            title="Ingrese solo letras y espacios."
                        >
                        @error('nombre') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="apellido_p">Apellido Paterno</label>
                        <input 
                            id="apellido_paterno" 
                            name="apellido_paterno" 
                            type="text"
                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                            value="{{ old('apellido_paterno') }}"
                            required
                            minlength="3" 
                            maxlength="20"
                            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s\-']+$"
                            title="Ingrese solo letras y espacios."
                        >
                        @error('apellido_paterno') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input 
                            id="apellido_materno" 
                            name="apellido_materno" 
                            type="text"
                            class="form-control @error('apellido_materno') is-invalid @enderror"
                            value="{{ old('apellido_materno') }}"
                            required 
                            minlength="3" 
                            maxlength="20" 
                            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s\-']+$"
                            title="Ingrese solo letras y espacios."
                        >
                        @error('apellido_materno') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="edad">Edad</label>
                        <input 
                            id="edad" 
                            name="edad" 
                            type="number"
                            class="form-control @error('edad') is-invalid @enderror"
                            value="{{ old('edad') }}"
                            required 
                            min="1" 
                            max="124" 
                            step="1"
                            title="La edad mínima es de 1 año y la máxima de 124"
                        >
                        @error('edad') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group col-md-5">
                        <label for="email">Email</label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required 
                            minlength="10" 
                            maxlength="50"
                            title="Correo válido que comienza con letra, sin espacios."
                        >
                        @error('email') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                        <small class="form-text text-muted">Máx. 50 caracteres. No debe empezar con número.</small>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="telefono">Teléfono</label>
                        <input 
                            id="telefono" 
                            name="telefono" 
                            type="tel"
                            inputmode="numeric"
                            class="form-control @error('telefono') is-invalid @enderror"
                            value="{{ old('telefono') }}"
                            required
                            minlength="10" 
                            maxlength="10" 
                            pattern="^[0-9]+$"
                            title="Solo dígitos, sin espacios ni guiones."
                        >
                        @error('telefono') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="form-group col-md-2">
                        <label for="id_grupo">Grupo</label>
                        <select id="id_grupo" name="id_grupo" class="form-control @error('id_grupo') is-invalid @enderror">
                            <option value="">-- Ninguno --</option>
                            @foreach($grupos as $grupo)
                                <option value="{{ $grupo->id_grupo }}" {{ old('id_grupo') == $grupo->id_grupo ? 'selected' : '' }}>
                                    {{ optional($grupo->semestre)->semestre ?? '' }} - 
                                    {{ optional($grupo->clase)->clase ?? '-' }} - 
                                    {{ optional($grupo->turno)->turno ?? '-' }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_grupo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


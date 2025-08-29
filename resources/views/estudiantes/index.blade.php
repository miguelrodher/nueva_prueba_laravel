@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Lista de Estudiantes</h1>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Nuevo Estudiante</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->id_estudiante }}</td>
                            <td>{{ $estudiante->nombre }} {{ $estudiante->apellido_paterno }} {{ $estudiante->apellido_materno }}</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>{{ $estudiante->email }}</td>
                            <td>{{ $estudiante->telefono }}</td>
                            
                            <td>
						        {{ optional($estudiante->grupo->semestre)->semestre ?? '-' }}
						        {{ optional($estudiante->grupo)->id_grupo ? '-' : '' }}
						        {{ optional($estudiante->grupo->clase)->clase ?? '' }}
						        {{ optional($estudiante->grupo->turno)->turno ? '-' . optional($estudiante->grupo->turno)->turno : '' }}
						        {{-- Resultado ejemplo: "Primero - A - Matutino" o "-" si no tiene grupo --}}
						    </td>

                            <td>
                                <a href="{{ route('estudiantes.edit', $estudiante->id_estudiante) }}" class="btn btn-sm btn-warning">Editar</a>

                                <form action="{{ route('estudiantes.destroy', $estudiante->id_estudiante) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Eliminar este estudiante?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay estudiantes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

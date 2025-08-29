@extends('layouts.app')

@section('title', 'Grupos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Grupos</h1>
        <a href="{{ route('grupos.create') }}" class="btn btn-primary">Nuevo Grupo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Clase</th>
                        <th>Turno</th>
                        <th>Semestre</th>
                        <th># Estudiantes</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->id_grupo }}</td>
                            <td>{{ $grupo->clase->clase }}</td>
                            <td>{{ $grupo->turno->turno }}</td>
                            <td>{{ $grupo->semestre->semestre }}</td>
                            <td>{{ $grupo->estudiantes->count() }}</td>
                            <td>
                                <a href="{{ route('grupos.edit', $grupo->id_grupo) }}" class="btn btn-sm btn-warning">Editar</a>

                                <form action="{{ route('grupos.destroy', $grupo->id_grupo) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Eliminar este grupo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay grupos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

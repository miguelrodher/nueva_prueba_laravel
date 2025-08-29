@extends('layouts.app')

@section('title', 'Listado de Turnos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Listado de Turnos</h1>
    <a href="{{ route('turnos.create') }}" class="btn btn-primary">Nuevo Turno</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Turno</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($turnos as $turno)
            <tr>
                <td>{{ $turno->id_turno }}</td>
                <td>{{ $turno->turno }}</td>
                <td>
                    <a href="{{ route('turnos.edit', $turno->id_turno) }}" class="btn btn-sm btn-warning">Editar</a>
                    
                    <form action="{{ route('turnos.destroy', $turno->id_turno) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este turno?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay turnos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

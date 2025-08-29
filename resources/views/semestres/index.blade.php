@extends('layouts.app')

@section('title', 'Listado de Semestres')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Listado de Semestres</h1>
    <a href="{{ route('semestres.create') }}" class="btn btn-primary">Nuevo Semestre</a>
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
            <th>Semestre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($semestres as $semestre)
            <tr>
                <td>{{ $semestre->id_semestre }}</td>
                <td>{{ $semestre->semestre }}</td>
                <td>
                    <a href="{{ route('semestres.edit', $semestre->id_semestre) }}" class="btn btn-sm btn-warning">Editar</a>
                    
                    <form action="{{ route('semestres.destroy', $semestre->id_semestre) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este semestre?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay semestres registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@extends('layouts.app')

@section('title', 'Listado de Clases')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Listado de Clases</h1>
    <a href="{{ route('clases.create') }}" class="btn btn-primary">Nueva Clase</a>
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
            <th>Clase</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($clases as $clase)
            <tr>
                <td>{{ $clase->id_clase }}</td>
                <td>{{ $clase->clase }}</td>
                <td>
                    <a href="{{ route('clases.edit', $clase->id_clase) }}" class="btn btn-sm btn-warning">Editar</a>
                    
                    <form action="{{ route('clases.destroy', $clase->id_clase) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta clase?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No hay clases registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

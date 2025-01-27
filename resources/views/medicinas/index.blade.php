@extends('layouts.master')

@section('title', 'Lista de Medicinas')

@section('content')
<div class="container mt-4">
    <h1>Lista de Medicinas</h1>
    <a href="{{ route('medicinas.create') }}" class="btn btn-primary mb-3">Nueva Medicina</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicinas as $medicina)
                <tr>
                    <td>{{ $medicina->id }}</td>
                    <td>{{ $medicina->nombre }}</td>
                    <td>{{ $medicina->marca }}</td>
                    <td>{{ $medicina->descripcion }}</td>
                    <td>
                        <a href="{{ route('medicinas.show', $medicina->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('medicinas.edit', $medicina->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('medicinas.destroy', $medicina->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

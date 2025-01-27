@extends('layouts.master')

@section('title', 'Lista de Recetas')

@section('content')
<div class="container mt-4">
    <h1>Lista de Recetas</h1>
    <a href="{{ route('recetas.create') }}" class="btn btn-primary mb-3">Nueva Receta</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Medicina</th>
                <th>Dosis</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recetas as $receta)
                <tr>
                    <td>{{ $receta->id }}</td>
                    <td>{{ $receta->paciente->usuario->nombre }} {{ $receta->paciente->usuario->apellido }}</td>
                    <td>{{ $receta->doctor->usuario->nombre }} {{ $receta->doctor->usuario->apellido }}</td>
                    <td>{{ $receta->medicina->nombre }}</td>
                    <td>{{ $receta->dosis }}</td>
                    <td>
                        <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('recetas.edit', $receta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST" style="display:inline-block;">
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
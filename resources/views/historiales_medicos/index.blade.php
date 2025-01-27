@extends('layouts.master')

@section('title', 'Lista de Historiales Médicos')

@section('content')
<div class="container mt-4">
    <h1>Lista de Historiales Médicos</h1>
    <a href="{{ route('historiales_medicos.create') }}" class="btn btn-primary mb-3">Nuevo Historial Médico</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historiales as $historial)
                <tr>
                    <td>{{ $historial->id }}</td>
                    <td>{{ $historial->paciente->usuario->nombre }} {{ $historial->paciente->usuario->apellido }}</td>
                    <td>{{ $historial->fecha }}</td>
                    <td>{{ $historial->descripcion }}</td>
                    <td>
                        <a href="{{ route('historiales_medicos.show', $historial->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('historiales_medicos.edit', $historial->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('historiales_medicos.destroy', $historial->id) }}" method="POST" style="display:inline-block;">
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

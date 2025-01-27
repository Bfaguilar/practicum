@extends('layouts.master')

@section('title', 'Lista de Doctores')

@section('content')
<div class="container mt-4">
    <h1>Lista de Doctores</h1>
    <a href="{{ route('doctores.create') }}" class="btn btn-primary mb-3">Nuevo Doctor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Especialidad</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctores as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->usuario->nombre }} {{ $doctor->usuario->apellido }}</td>
                    <td>{{ $doctor->especialidad }}</td>
                    <td>{{ $doctor->departamento }}</td>
                    <td>
                        <a href="{{ route('doctores.show', $doctor->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('doctores.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('doctores.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
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

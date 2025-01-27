@extends('layouts.master')

@section('title', 'Lista de Administradores')

@section('content')
<div class="container mt-4">
    <h1>Lista de Administradores</h1>
    <a href="{{ route('administradores.create') }}" class="btn btn-primary mb-3">Nuevo Administrador</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administradores as $administrador)
                <tr>
                    <td>{{ $administrador->id }}</td>
                    <td>{{ $administrador->usuario->nombre }} {{ $administrador->usuario->apellido }}</td>
                    <td>{{ $administrador->cargo }}</td>
                    <td>{{ $administrador->departamento }}</td>
                    <td>
                        <a href="{{ route('administradores.show', $administrador->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('administradores.edit', $administrador->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('administradores.destroy', $administrador->id) }}" method="POST" style="display:inline-block;">
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

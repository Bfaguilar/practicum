@extends('layouts.master')

@section('title', 'Listado de Pacientes')

@section('content')
<div class="container">    
<h2>Listado de Usuarios</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Tipo de Usuario</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
           <!-- Usuarios ficticios -->
           @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario['id'] }}</td>
                <td>{{ $usuario['nombre'] }}</td>
                <td>{{ $usuario['apellido'] }}</td>
                <td>{{ $usuario['fecha_nacimiento'] }}</td>
                <td>{{ $usuario['direccion'] }}</td>
                <td>{{ $usuario['tipo_usuario'] }}</td>
                <td>{{ $usuario['telefono'] }}</td>
                <td>{{ $usuario['correo'] }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', $usuario['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario['id']) }}" method="POST" style="display:inline-block;">
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
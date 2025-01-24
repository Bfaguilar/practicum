@extends('layouts.master')

@section('title', 'Listado de Administradores')

@section('content')
<div class="container">    
<h2>Listado de Administradores</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Administradores ficticios -->
            @foreach($administradores as $administrador)
            <tr>
                <td>{{ $administrador['id'] }}</td>
                <td>{{ $administrador['cargo'] }}</td>
                <td>{{ $administrador['departamento'] }}</td>
                <td>
                    <a href="{{ route('administradores.edit', $administrador['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('administradores.destroy', $administrador['id']) }}" method="POST" style="display:inline-block;">
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
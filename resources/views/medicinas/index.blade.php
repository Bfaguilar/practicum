@extends('layouts.master')

@section('title', 'Listado de Medicinas')

@section('content')
<div class="container">
    <h2>Listado de Medicinas</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Marca</th>
                <th>Descripcion</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
             <!-- Medicinas ficticias -->
             @foreach($medicinas as $medicina)
            <tr>
                <td>{{ $medicina['id'] }}</td>
                <td>{{ $medicina['nombre'] }}</td>
                <td>{{ $medicina['marca'] }}</td>
                <td>{{ $medicina['descripcion'] }}</td>
                <td>
                    <a href="{{ route('medicinas.show', $medicina['id']) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('medicinas.edit', $medicina['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('medicinas.destroy', $medicina['id']) }}" method="POST" style="display:inline-block;">
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
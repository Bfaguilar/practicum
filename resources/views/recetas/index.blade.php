@extends('layouts.master')

@section('title', 'Listado de recetas')

@section('content')
<div class="container">
    <h2>Listado de recetas</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente ID</th>
                <th>Doctor ID</th>
                <th>Dosis</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
             <!-- Recetas ficticias -->
             @foreach($recetas as $receta)
            <tr>
                <td>{{ $receta['id'] }}</td>
                <td>{{ $receta['id_paciente'] }}</td>
                <td>{{ $receta['id_doctor'] }}</td>
                <td>{{ $receta['dosis'] }}</td>
                <td>
                    <a href="{{ route('recetas.show', $receta['id']) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('recetas.edit', $receta['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('recetas.destroy', $receta['id']) }}" method="POST" style="display:inline-block;">
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
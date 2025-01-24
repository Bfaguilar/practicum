@extends('layouts.master')

@section('title', 'Listado de Consultas Medicas')

@section('content')
<div class="container">
    <h2>Listado de Consultas Medicas</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Cita Medica ID</th>
                <th>Diagnostico</th>
                <th>Medicina ID</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Consultas médicas ficticias -->
            @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta['id'] }}</td>    
                <td>{{ $consulta['cita_medica_id'] }}</td>
                <td>{{ $consulta['diagnostico'] }}</td>
                <td>{{ $consulta['medicina_id'] }}</td>
                <td>
                    <a href="{{ route('consultas_medicas.edit', $consulta['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('consultas_medicas.destroy', $consulta['id']) }}" method="POST" style="display:inline-block;">
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
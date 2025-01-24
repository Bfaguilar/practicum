@extends('layouts.master')

@section('title', 'Listado de Historiales Medicos')

@section('content')
<div class="container">
    <h2>Listado de Historiales Medicos</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>id</th>
                <th>Consulta Médica ID</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Historiales médicos ficticios -->
            @foreach($historiales as $historial)
            <tr>
            <td>{{ $historial['id'] }}</td>    
            <td>{{ $historial['consulta_medica_id'] }}</td>
                <td>
                    <a href="{{ route('historiales-medicos.show', $historial['id']) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('historiales-medicos.edit', $historial['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('historiales-medicos.destroy', $historial['id']) }}" method="POST" style="display:inline-block;">
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
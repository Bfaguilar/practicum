@extends('layouts.master')

@section('title', 'Listado de Informes')

@section('content')
<div class="container">
    <h2>Listado de Informes</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cita Medica ID</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Informes ficticios -->
            @foreach($informes as $informe)
            <tr>
            <td>{{ $informe['id'] }}</td>
                <td>{{ $informe['id_CitaMedica'] }}</td>
                <td>
                    <a href="{{ route('informes.show', $informe['id']) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('informes.edit', $informe['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('informes.destroy', $informe['id']) }}" method="POST" style="display:inline-block;">
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
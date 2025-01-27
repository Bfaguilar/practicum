@extends('layouts.master')

@section('title', 'Lista de Consultas Médicas')

@section('content')
<div class="container mt-4">
    <h1>Lista de Consultas Médicas</h1>
    <a href="{{ route('consultas_medicas.create') }}" class="btn btn-primary mb-3">Nueva Consulta Médica</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cita Médica</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Medicina</th>
                <th>Diagnóstico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->citaMedica->id }}</td>
                    <td>{{ $consulta->citaMedica->paciente->usuario->nombre }} {{ $consulta->citaMedica->paciente->usuario->apellido }}</td>
                    <td>{{ $consulta->citaMedica->doctor->usuario->nombre }} {{ $consulta->citaMedica->doctor->usuario->apellido }}</td>
                    <td>{{ $consulta->medicina->nombre }}</td>
                    <td>{{ $consulta->diagnostico }}</td>
                    <td>
                        <a href="{{ route('consultas_medicas.show', $consulta->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('consultas_medicas.edit', $consulta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('consultas_medicas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
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

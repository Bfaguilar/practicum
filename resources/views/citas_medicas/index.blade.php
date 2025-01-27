@extends('layouts.master')

@section('title', 'Lista de Citas Médicas')

@section('content')
<div class="container mt-4">
    <h1>Lista de Citas Médicas</h1>
    <a href="{{ route('citas_medicas.create') }}" class="btn btn-primary mb-3">Nueva Cita Médica</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->paciente->usuario->nombre }} {{ $cita->paciente->usuario->apellido }}</td>
                    <td>{{ $cita->doctor->usuario->nombre }} {{ $cita->doctor->usuario->apellido }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>
                        <a href="{{ route('citas_medicas.show', $cita->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('citas_medicas.edit', $cita->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('citas_medicas.destroy', $cita->id) }}" method="POST" style="display:inline-block;">
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

@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Listado de Citas Médicas</h1>
    <a href="{{ route('citas_medicas.create') }}" class="btn btn-primary mb-3">Crear Cita Médica</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>
                        <a href="{{ route('citas_medicas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('citas_medicas.destroy', $cita->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Lista de Informes')

@section('content')
<div class="container mt-4">
    <h1>Lista de Informes</h1>
    <a href="{{ route('informes.create') }}" class="btn btn-primary mb-3">Nuevo Informe</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cita Médica</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informes as $informe)
                <tr>
                    <td>{{ $informe->id }}</td>
                    <td>Cita #{{ $informe->cita_medica_id }}</td>
                    <td>{{ $informe->fecha }}</td>
                    <td>{{ $informe->descripcion }}</td>
                    <td>
                        <a href="{{ route('informes.show', $informe->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('informes.edit', $informe->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('informes.destroy', $informe->id) }}" method="POST" style="display:inline-block;">
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

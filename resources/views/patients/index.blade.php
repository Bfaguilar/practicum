@extends('layouts.master')

@section('title', 'Listado de Pacientes')

@section('content')
<div class="container">
    <h2>Listado de Pacientes</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Contacto</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Pacientes ficticios -->
            @foreach($pacientes as $paciente)
            <tr>
            <td>{{ $paciente['id'] }}</td>
                <td>{{ $paciente['name'] }}</td>
                <td>{{ $paciente['age'] }}</td>
                <td>{{ $paciente['contact'] }}</td>
                <td>
                    <a href="{{ route('patients.edit', $paciente['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('patients.destroy', $paciente['id']) }}" method="POST" style="display:inline-block;">
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
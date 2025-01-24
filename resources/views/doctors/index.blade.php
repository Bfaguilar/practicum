@extends('layouts.master')

@section('title', 'Listado de Doctores')

@section('content')
<div class="container">
    <h2>Listado de Doctores</h2>
    <table class="table table -stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Speciality</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <!-- Doctores ficticios -->
            @foreach($doctores as $doctor)
            <tr>
                <td>{{ $doctor['id'] }}</td>
                <td>{{ $doctor['nombre'] }}</td>
                <td>{{ $doctor['especialidad'] }}</td>
                <td>{{ $doctor['contacto'] }}</td>
                <td>
                    <a href="{{ route('doctors.edit', $doctor['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('doctors.destroy', $doctor['id']) }}" method="POST" style="display:inline-block;">
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
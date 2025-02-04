@extends('layouts.master')

@section('title', 'Crear Receta')

@section('content')
<div class="container mt-4">
    <h1>Crear Receta</h1>
    <form action="{{ route('recetas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="" disabled selected>Selecciona un paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">
                        {{ $paciente->usuario->nombre }} {{ $paciente->usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="" disabled selected>Selecciona un doctor</option>
                @foreach ($doctores as $doctor)
                    <option value="{{ $doctor->id }}">
                        {{ $doctor->usuario->nombre }} {{ $doctor->usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medicina_id" class="form-label">Medicina</label>
            <select name="medicina_id" id="medicina_id" class="form-control" required>
                <option value="" disabled selected>Selecciona una medicina</option>
                @foreach ($medicinas as $medicina)
                    <option value="{{ $medicina->id }}">
                        {{ $medicina->nombre }} ({{ $medicina->marca }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis</label>
            <input type="text" name="dosis" id="dosis" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection


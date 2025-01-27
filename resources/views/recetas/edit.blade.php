@extends('layouts.master')

@section('title', 'Editar Receta')

@section('content')
<div class="container mt-4">
    <h1>Editar Receta</h1>
    <form action="{{ route('recetas.update', $receta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $receta->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->usuario->nombre }} {{ $paciente->usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                @foreach ($doctores as $doctor)
                    <option value="{{ $doctor->id }}" {{ $receta->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->usuario->nombre }} {{ $doctor->usuario->apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="medicina_id" class="form-label">Medicina</label>
            <select name="medicina_id" id="medicina_id" class="form-control" required>
                @foreach ($medicinas as $medicina)
                    <option value="{{ $medicina->id }}" {{ $receta->medicina_id == $medicina->id ? 'selected' : '' }}>
                        {{ $medicina->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis</label>
            <input type="text" name="dosis" id="dosis" class="form-control" value="{{ $receta->dosis }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection

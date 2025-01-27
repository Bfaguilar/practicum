@extends('layouts.master')

@section('title', 'Agendar Cita Médica')

@section('content')
<div class="container mt-4">
    <h1>Agendar Cita Médica</h1>
    <form action="{{ route('citas_medicas.store') }}" method="POST">
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
                        {{ $doctor->usuario->nombre }} {{ $doctor->usuario->apellido }} ({{ $doctor->especialidad }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Agendar</button>
    </form>
</div>
@endsection

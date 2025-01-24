@extends('layouts.master')

@section('content')
<div class="container mt-5">
        <h1>Agendar Cita Médica</h1>

        <form action="{{ route('citas_medicas.store') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="paciente_id">Paciente:</label>
                <select name="paciente_id" id="paciente_id" class="form-control">
                    <option value="">Seleccione un paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="doctor_id">Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value="">Seleccione un Doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->nombre }} {{ $doctor->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha de la cita:</label>
                <input type="datetime-local" name="fecha" id="fecha" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Agendar</button>
        </form>
    </div>
@endsection
@extends('layouts.master')

@section('title', 'Nueva Consulta Médica')

@section('content')
<div class="container mt-4">
    <h1>Nueva Consulta Médica</h1>
    <form action="{{ route('consultas_medicas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cita_medica_id" class="form-label">Cita Médica</label>
            <select name="cita_medica_id" id="cita_medica_id" class="form-control" required>
                <option value="" disabled selected>Selecciona una cita médica</option>
                @foreach ($citas_medicas as $cita)
                    <option value="{{ $cita->id }}">
                        Paciente: {{ $cita->paciente->usuario->nombre }} {{ $cita->paciente->usuario->apellido }} -
                        Doctor: {{ $cita->doctor->usuario->nombre }} {{ $cita->doctor->usuario->apellido }} -
                        Fecha: {{ $cita->fecha }} - Hora: {{ $cita->hora }}
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
            <label for="diagnostico" class="form-label">Diagnóstico</label>
            <textarea name="diagnostico" id="diagnostico" class="form-control" rows="4" required placeholder="Ingresa el diagnóstico"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

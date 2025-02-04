@extends('layouts.master')

@section('title', 'Crear Informe')

@section('content')
<div class="container mt-4">
    <h1>Crear Informe</h1>
    <form action="{{ route('informes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cita_medica_id" class="form-label">Cita Médica</label>
            <select name="cita_medica_id" id="cita_medica_id" class="form-control" required>
                <option value="" disabled selected>Selecciona una cita médica</option>
                @foreach ($citas_medicas as $cita)
                    <option value="{{ $cita->id }}">Cita #{{ $cita->id }} - Fecha: {{ $cita->fecha }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

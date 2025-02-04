@extends('layouts.master')

@section('title', 'Crear Administrador')

@section('content')
<div class="container mt-4">
    <h1>Crear Administrador</h1>
    <form action="{{ route('administradores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-control" required>
                <option value="" disabled selected>Selecciona un usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <input type="text" name="departamento" id="departamento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

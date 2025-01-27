@extends('layouts.master')

@section('title', 'Detalles del Rol')

@section('content')
<div class="container mt-4">
    <h1>Detalles del Rol</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $rol->id }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $rol->nombre }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $rol->descripcion }}</li>
    </ul>

    <h3 class="mt-4">Usuarios con este Rol</h3>
    <ul class="list-group">
        @foreach ($usuarios as $usuario)
            <li class="list-group-item">{{ $usuario->nombre }} {{ $usuario->apellido }}</li>
        @endforeach
    </ul>

    <a href="{{ route('roles.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection

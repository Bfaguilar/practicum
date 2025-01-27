@extends('layouts.master')

@section('title', 'Detalles de la Receta')

@section('content')
<div class="container mt-4">
    <h1>Detalles de la Receta</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $receta->id }}</li>
        <li class="list-group-item"><strong>Paciente:</strong> {{ $receta->paciente->usuario->nombre }} {{ $receta->paciente->usuario->apellido }}</li>
        <li class="list-group-item"><strong>Doctor:</strong> {{ $receta->doctor->usuario->nombre }} {{ $receta->doctor->usuario->apellido }}</li>
        <li class="list-group-item"><strong>Medicina:</strong> {{ $receta->medicina->nombre }}</li>
        <li class="list-group-item"><strong>Dosis:</strong> {{ $receta->dosis }}</li>
    </ul>
    <a href="{{ route('recetas.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection

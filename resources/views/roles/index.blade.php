@extends('layouts.master')

@section('title', 'Roles')

@section('content')
    <div class="container">
    <h1 class="text-center mb-4">Roles del Sistema</h1>
    <div class="row">
        @foreach ($roles as $rol)
        <div class="col-md-4">
            <div class="card {{ $rol['color'] }} text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $rol['nombre'] }}</h5>
                    <p class="card-text">{{ $rol['descripcion'] }}</p>
                    <a href="#" class="btn btn-light">Ver más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
        <tbody>
            // codigo en php para consulta base de datos de la tabla pacientes.
            
        </tbody>
@endsection
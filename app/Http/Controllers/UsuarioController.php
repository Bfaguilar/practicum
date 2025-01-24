<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = [
            [
                'id' => 1,
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'fecha_nacimiento' => '1990-01-01',
                'direccion' => 'Calle Ficticia 123, Ciudad',
                'tipo_usuario' => 'Administrador',
                'telefono' => '555-1234',
                'correo' => 'juan.perez@example.com',
            ],
            [
                'id' => 2,
                'nombre' => 'María',
                'apellido' => 'López',
                'fecha_nacimiento' => '1985-02-15',
                'direccion' => 'Avenida Libertad 456, Ciudad',
                'tipo_usuario' => 'Médico',
                'telefono' => '555-5678',
                'correo' => 'maria.lopez@example.com',
            ],
            [
                'id' => 3,
                'nombre' => 'Carlos',
                'apellido' => 'Gómez',
                'fecha_nacimiento' => '1992-03-30',
                'direccion' => 'Calle Sol 789, Ciudad',
                'tipo_usuario' => 'Paciente',
                'telefono' => '555-9101',
                'correo' => 'carlos.gomez@example.com',
            ]
        ];

        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', ['id' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', ['id' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

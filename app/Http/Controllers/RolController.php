<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Acceso completo al sistema', 'color' => 'bg-primary'],
            ['nombre' => 'Médico', 'descripcion' => 'Gestionar citas y pacientes', 'color' => 'bg-success'],
            ['nombre' => 'Paciente', 'descripcion' => 'Ver y gestionar citas médicas', 'color' => 'bg-warning'],
        ];
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.index');
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
    public function show(Rol $rol)
    {
        return view('roles.show', ['id' => $rol]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        return view('roles.edit', ['id' => $rol]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        //
    }
}

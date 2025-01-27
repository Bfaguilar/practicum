<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Usuario;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Muestra una lista de doctores.
     */
    public function index()
    {
        $doctores = Doctor::with('usuario')->get(); // Carga la relación con Usuario
        return view('doctores.index', compact('doctores'));
    }

    /**
     * Muestra el formulario para crear un nuevo doctor.
     */
    public function create()
    {
        $usuarios = Usuario::doesntHave('doctor')->get(); // Usuarios sin doctor asociado
        return view('doctores.create', compact('usuarios'));
    }

    /**
     * Almacena un nuevo doctor en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id|unique:doctores,usuario_id',
            'especialidad' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctores.index')->with('success', 'Doctor creado exitosamente.');
    }

    /**
     * Muestra los detalles de un doctor.
     */
    public function show(Doctor $doctor)
    {
        $doctor->load('usuario', 'recetas'); // Carga relaciones con Usuario y Recetas
        return view('doctores.show', compact('doctor'));
    }

    /**
     * Muestra el formulario para editar un doctor.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctores.edit', compact('doctor'));
    }

    /**
     * Actualiza un doctor en la base de datos.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'especialidad' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctores.index')->with('success', 'Doctor actualizado exitosamente.');
    }

    /**
     * Elimina un doctor de la base de datos.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctores.index')->with('success', 'Doctor eliminado exitosamente.');
    }
}

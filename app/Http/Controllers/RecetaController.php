<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Medicina;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Muestra una lista de recetas.
     */
    public function index()
    {
        $recetas = Receta::with('paciente.usuario', 'doctor.usuario', 'medicina')->get();
        return view('recetas.index', compact('recetas'));
    }

    /**
     * Muestra el formulario para crear una nueva receta.
     */
    public function create()
    {
        $pacientes = Paciente::with('usuario')->get();
        $doctores = Doctor::with('usuario')->get();
        $medicinas = Medicina::all();

        return view('recetas.create', compact('pacientes', 'doctores', 'medicinas'));
    }

    /**
     * Almacena una nueva receta en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctores,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'dosis' => 'required|string|max:255',
        ]);

        Receta::create($request->all());

        return redirect()->route('recetas.index')->with('success', 'Receta creada exitosamente.');
    }

    /**
     * Muestra los detalles de una receta.
     */
    public function show(Receta $receta)
    {
        return view('recetas.show', compact('receta'));
    }

    /**
     * Muestra el formulario para editar una receta.
     */
    public function edit(Receta $receta)
    {
        $pacientes = Paciente::with('usuario')->get();
        $doctores = Doctor::with('usuario')->get();
        $medicinas = Medicina::all();

        return view('recetas.edit', compact('receta', 'pacientes', 'doctores', 'medicinas'));
    }

    /**
     * Actualiza una receta en la base de datos.
     */
    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctores,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'dosis' => 'required|string|max:255',
        ]);

        $receta->update($request->all());

        return redirect()->route('recetas.index')->with('success', 'Receta actualizada exitosamente.');
    }

    /**
     * Elimina una receta de la base de datos.
     */
    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()->route('recetas.index')->with('success', 'Receta eliminada exitosamente.');
    }
}

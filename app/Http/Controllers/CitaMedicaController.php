<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use App\Models\Paciente;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CitaMedicaController extends Controller
{
    /**
     * Muestra una lista de citas médicas.
     */
    public function index()
    {
        $citas = CitaMedica::with('paciente.usuario', 'doctor.usuario')->get();
        return view('citas_medicas.index', compact('citas'));
    }

    /**
     * Muestra el formulario para crear una nueva cita médica.
     */
    public function create()
    {
        $pacientes = Paciente::with('usuario')->get();
        $doctores = Doctor::with('usuario')->get();
        return view('citas_medicas.create', compact('pacientes', 'doctores'));
    }

    /**
     * Almacena una nueva cita médica en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctores,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        CitaMedica::create($request->all());
        return redirect()->route('citas_medicas.index')->with('success', 'Cita médica creada exitosamente.');
    }

    /**
     * Muestra los detalles de una cita médica.
     */
    public function show(CitaMedica $citaMedica)
    {
        return view('citas_medicas.show', compact('citaMedica'));
    }

    /**
     * Muestra el formulario para editar una cita médica.
     */
    public function edit(CitaMedica $citaMedica)
    {
        $pacientes = Paciente::with('usuario')->get();
        $doctores = Doctor::with('usuario')->get();
        return view('citas_medicas.edit', compact('citaMedica', 'pacientes', 'doctores'));
    }

    /**
     * Actualiza una cita médica en la base de datos.
     */
    public function update(Request $request, CitaMedica $citaMedica)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:doctores,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        $citaMedica->update($request->all());
        return redirect()->route('citas_medicas.index')->with('success', 'Cita médica actualizada exitosamente.');
    }

    /**
     * Elimina una cita médica de la base de datos.
     */
    public function destroy(CitaMedica $citaMedica)
    {
        $citaMedica->delete();
        return redirect()->route('citas_medicas.index')->with('success', 'Cita médica eliminada exitosamente.');
    }
}

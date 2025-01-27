<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedica;
use App\Models\CitaMedica;
use App\Models\Medicina;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    /**
     * Muestra una lista de consultas médicas.
     */
    public function index()
    {
        $consultas = ConsultaMedica::with('citaMedica', 'medicina')->get();
        return view('consultas_medicas.index', compact('consultas'));
    }

    /**
     * Muestra el formulario para crear una nueva consulta médica.
     */
    public function create()
    {
        $citas_medicas = CitaMedica::with('paciente.usuario', 'doctor.usuario')->get();
        $medicinas = Medicina::all();
        return view('consultas_medicas.create', compact('citas_medicas', 'medicinas'));
    }

    /**
     * Almacena una nueva consulta médica en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cita_medica_id' => 'required|exists:citas_medicas,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'diagnostico' => 'required|string|max:1000',
        ]);

        ConsultaMedica::create($request->all());

        return redirect()->route('consultas_medicas.index')->with('success', 'Consulta médica creada exitosamente.');
    }

    /**
     * Muestra los detalles de una consulta médica.
     */
    public function show(ConsultaMedica $consultaMedica)
    {
        return view('consultas_medicas.show', compact('consultaMedica'));
    }

    /**
     * Muestra el formulario para editar una consulta médica.
     */
    public function edit(ConsultaMedica $consultaMedica)
    {
        $citas_medicas = CitaMedica::with('paciente.usuario', 'doctor.usuario')->get();
        $medicinas = Medicina::all();
        return view('consultas_medicas.edit', compact('consultaMedica', 'citas_medicas', 'medicinas'));
    }

    /**
     * Actualiza una consulta médica en la base de datos.
     */
    public function update(Request $request, ConsultaMedica $consultaMedica)
    {
        $request->validate([
            'cita_medica_id' => 'required|exists:citas_medicas,id',
            'medicina_id' => 'required|exists:medicinas,id',
            'diagnostico' => 'required|string|max:1000',
        ]);

        $consultaMedica->update($request->all());

        return redirect()->route('consultas_medicas.index')->with('success', 'Consulta médica actualizada exitosamente.');
    }

    /**
     * Elimina una consulta médica de la base de datos.
     */
    public function destroy(ConsultaMedica $consultaMedica)
    {
        $consultaMedica->delete();

        return redirect()->route('consultas_medicas.index')->with('success', 'Consulta médica eliminada exitosamente.');
    }
}

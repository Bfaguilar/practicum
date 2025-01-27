<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    /**
     * Muestra una lista de historiales médicos.
     */
    public function index()
    {
        $historiales = HistorialMedico::with('paciente.usuario')->get();
        return view('historiales_medicos.index', compact('historiales'));
    }

    /**
     * Muestra el formulario para crear un nuevo historial médico.
     */
    public function create()
    {
        $pacientes = Paciente::with('usuario')->get();
        return view('historiales_medicos.create', compact('pacientes'));
    }

    /**
     * Almacena un nuevo historial médico en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'descripcion' => 'required|string|max:1000',
            'fecha' => 'required|date',
        ]);

        HistorialMedico::create($request->all());

        return redirect()->route('historiales_medicos.index')->with('success', 'Historial médico creado exitosamente.');
    }

    /**
     * Muestra los detalles de un historial médico.
     */
    public function show(HistorialMedico $historialMedico)
    {
        return view('historiales_medicos.show', compact('historialMedico'));
    }

    /**
     * Muestra el formulario para editar un historial médico.
     */
    public function edit(HistorialMedico $historialMedico)
    {
        $pacientes = Paciente::with('usuario')->get();
        return view('historiales_medicos.edit', compact('historialMedico', 'pacientes'));
    }

    /**
     * Actualiza un historial médico en la base de datos.
     */
    public function update(Request $request, HistorialMedico $historialMedico)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'descripcion' => 'required|string|max:1000',
            'fecha' => 'required|date',
        ]);

        $historialMedico->update($request->all());

        return redirect()->route('historiales_medicos.index')->with('success', 'Historial médico actualizado exitosamente.');
    }

    /**
     * Elimina un historial médico de la base de datos.
     */
    public function destroy(HistorialMedico $historialMedico)
    {
        $historialMedico->delete();

        return redirect()->route('historiales_medicos.index')->with('success', 'Historial médico eliminado exitosamente.');
    }
}

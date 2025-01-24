<?php

namespace App\Http\Controllers;

use App\Models\CitaMedica;
use Illuminate\Http\Request;

class CitaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$citas = CitaMedica::all();
        return redirect()->route('citas_medicas.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = [
            (object) ['id' => 1, 'nombre' => 'Juan', 'apellido' => 'Pérez'],
            (object) ['id' => 2, 'nombre' => 'María', 'apellido' => 'López'],
        ];

        $doctors = [
            (object) ['id' => 1, 'nombre' => 'Dr. Carlos', 'apellido' => 'Gómez'],
            (object) ['id' => 2, 'nombre' => 'Dra. Ana', 'apellido' => 'Martínez'],
        ];

        return view('citas_medicas.create', compact('pacientes', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date',
            'paciente_id' => 'required|integer',
            'doctor_id' => 'required|integer',
        ]);

        CitaMedica::create($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas se creo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('citas_medicas.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('citas_medicas.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CitaMedica  $citaMedica)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'paciente_id' => 'required|integer',
            'doctor_id' => 'required|integer',
        ]);

        $citaMedica->update($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CitaMedica $citaMedica)
    {
        $citaMedica->delete();
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas eliminada satisfactoriamente');
    }
}
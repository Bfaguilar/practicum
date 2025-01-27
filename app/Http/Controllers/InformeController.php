<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\CitaMedica;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Muestra una lista de informes.
     */
    public function index()
    {
        $informes = Informe::with('citaMedica')->get();
        return view('informes.index', compact('informes'));
    }

    /**
     * Muestra el formulario para crear un nuevo informe.
     */
    public function create()
    {
        $citas_medicas = CitaMedica::all();
        return view('informes.create', compact('citas_medicas'));
    }

    /**
     * Almacena un nuevo informe en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cita_medica_id' => 'required|exists:citas_medicas,id',
            'descripcion' => 'required|string|max:1000',
            'fecha' => 'required|date',
        ]);

        Informe::create($request->all());

        return redirect()->route('informes.index')->with('success', 'Informe creado exitosamente.');
    }

    /**
     * Muestra los detalles de un informe.
     */
    public function show(Informe $informe)
    {
        return view('informes.show', compact('informe'));
    }

    /**
     * Muestra el formulario para editar un informe.
     */
    public function edit(Informe $informe)
    {
        $citas_medicas = CitaMedica::all();
        return view('informes.edit', compact('informe', 'citas_medicas'));
    }

    /**
     * Actualiza un informe en la base de datos.
     */
    public function update(Request $request, Informe $informe)
    {
        $request->validate([
            'cita_medica_id' => 'required|exists:citas_medicas,id',
            'descripcion' => 'required|string|max:1000',
            'fecha' => 'required|date',
        ]);

        $informe->update($request->all());

        return redirect()->route('informes.index')->with('success', 'Informe actualizado exitosamente.');
    }

    /**
     * Elimina un informe de la base de datos.
     */
    public function destroy(Informe $informe)
    {
        $informe->delete();

        return redirect()->route('informes.index')->with('success', 'Informe eliminado exitosamente.');
    }
}

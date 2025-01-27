<?php

namespace App\Http\Controllers;

use App\Models\Medicina;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    /**
     * Muestra una lista de medicinas.
     */
    public function index()
    {
        $medicinas = Medicina::all();
        return view('medicinas.index', compact('medicinas'));
    }

    /**
     * Muestra el formulario para crear una nueva medicina.
     */
    public function create()
    {
        return view('medicinas.create');
    }

    /**
     * Almacena una nueva medicina en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        Medicina::create($request->all());

        return redirect()->route('medicinas.index')->with('success', 'Medicina creada exitosamente.');
    }

    /**
     * Muestra los detalles de una medicina.
     */
    public function show(Medicina $medicina)
    {
        return view('medicinas.show', compact('medicina'));
    }

    /**
     * Muestra el formulario para editar una medicina.
     */
    public function edit(Medicina $medicina)
    {
        return view('medicinas.edit', compact('medicina'));
    }

    /**
     * Actualiza una medicina en la base de datos.
     */
    public function update(Request $request, Medicina $medicina)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $medicina->update($request->all());

        return redirect()->route('medicinas.index')->with('success', 'Medicina actualizada exitosamente.');
    }

    /**
     * Elimina una medicina de la base de datos.
     */
    public function destroy(Medicina $medicina)
    {
        $medicina->delete();

        return redirect()->route('medicinas.index')->with('success', 'Medicina eliminada exitosamente.');
    }
}

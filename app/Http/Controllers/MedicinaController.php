<?php

namespace App\Http\Controllers;

use App\Models\Medicina;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicinas = [
            [
                'id' => 1,
                'nombre' => 'Paracetamol',
                'marca' => 'Farmex',
                'descripcion' => 'Medicamento para el dolor y fiebre.',
            ],
            [
                'id' => 2,
                'nombre' => 'Ibuprofeno',
                'marca' => 'Genfar',
                'descripcion' => 'Antiinflamatorio para aliviar el dolor.',
            ],
            [
                'id' => 3,
                'nombre' => 'Amoxicilina',
                'marca' => 'Bayer',
                'descripcion' => 'Antibiótico para infecciones bacterianas.',
            ]
        ];

        return view('medicinas.index', compact('medicinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicinas.index');
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
    public function show(Medicina $medicina)
    {
        return view('nombre_vista.show', ['id' => $medicina]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicina $medicina)
    {
        return view('medicinas.edit', ['id' => $medicina]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicina $medicina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicina $medicina)
    {
        //
    }
}

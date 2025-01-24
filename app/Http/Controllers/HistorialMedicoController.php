<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = [
            [
                'id' => 1,
                'consulta_medica_id' => 101,
            ],
            [
                'id' => 2,
                'consulta_medica_id' => 102,
            ],
            [
                'id' => 3,
                'consulta_medica_id' => 103,
            ]
        ];

        return view('historiales-medicos.index', compact('historiales')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('historiales-medicos.create');
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
    public function show(HistorialMedico $historialMedico)
    {
        return view('historiales-medicos.show', ['id' => $historialMedico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialMedico $historialMedico)
    {
        return view('historiales-medicos.edit', ['id' => $historialMedico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialMedico $historialMedico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialMedico $historialMedico)
    {
        //
    }
}

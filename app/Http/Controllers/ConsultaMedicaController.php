<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedica;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = [
            [
                'id' => 1,
                'cita_medica_id' => 1,
                'diagnostico' => 'Hipertensión',
                'medicina_id' => 101,
            ],
            [
                'id' => 2,
                'cita_medica_id' => 2,
                'diagnostico' => 'Asma',
                'medicina_id' => 102,
            ],
            [
                'id' => 3,
                'cita_medica_id' => 3,
                'diagnostico' => 'Diabetes',
                'medicina_id' => 103,
            ]
        ];

        return view('consultas_medicas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultas_medicas.create');
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
    public function show($id)
    {
        return view('consultas_medicas.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('consultas_medicas.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConsultaMedica $consultaMedica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultaMedica $consultaMedica)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recetas = [
            [
                'id' => 1,
                'id_paciente' => 101,
                'id_doctor' => 201,
                'dosis' => '5mg cada 8 horas',
            ],
            [
                'id' => 2,
                'id_paciente' => 102,
                'id_doctor' => 202,
                'dosis' => '10mg antes de dormir',
            ],
            [
                'id' => 3,
                'id_paciente' => 103,
                'id_doctor' => 203,
                'dosis' => '2mg cada 6 horas',
            ]
        ];

        return view('recetas.index', compact('recetas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recetas.create');
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
    public function show(Receta $receta)
    {
        return view('recetas.show', ['id' => $receta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        return view('recetas.edit', ['id' => $receta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }
}

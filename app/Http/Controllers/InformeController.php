<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informes = [
            [
                'id' => 1,
                'id_CitaMedica' => 101,
            ],
            [
                'id' => 2,
                'id_CitaMedica' => 102,
            ],
            [
                'id' => 3,
                'id_CitaMedica' => 103,
            ]
        ];

        return view('informes.index', compact('informes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informes.create');
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
    public function show(Informe $informe)
    {
        return view('nombre_vista.show', ['id' => $informe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informe $informe)
    {
        return view('informes.edit', ['id' => $informe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informe $informe)
    {
        //
    }
}

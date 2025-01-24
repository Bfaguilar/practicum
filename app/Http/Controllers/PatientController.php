<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = [
            [
                'id' => 1,
                'name' => 'Carlos Pérez',
                'age' => 30,
                'contact' => '123-456-7890',
            ],
            [
                'id' => 2,
                'name' => 'Ana Gómez',
                'age' => 45,
                'contact' => '098-765-4321',
            ],
            [
                'id' => 3,
                'name' => 'Luis Martínez',
                'age' => 50,
                'contact' => '456-789-0123',
            ]
        ];

        return view('patients.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view('patients.index', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}

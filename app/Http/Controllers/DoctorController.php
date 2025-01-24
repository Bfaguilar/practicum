<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = [
            [
                'id' => 1,
                'nombre' => 'Dr. Juan Pérez',
                'especialidad' => 'Cardiólogo',
                'contacto' => '123-456-7890',
            ],
            [
                'id' => 2,
                'nombre' => 'Dra. María López',
                'especialidad' => 'Pediatra',
                'contacto' => '098-765-4321',
            ],
            [
                'id' => 3,
                'nombre' => 'Dr. Carlos Gómez',
                'especialidad' => 'Dermatólogo',
                'contacto' => '456-789-0123',
            ]
        ];

        return view('doctors.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create');
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
    public function show(Doctor $doctor)
    {
        return view('doctors.show', ['id' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', ['id' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}

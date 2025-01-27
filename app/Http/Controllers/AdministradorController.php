<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Muestra una lista de administradores.
     */
    public function index()
    {
        $administradores = Administrador::with('usuario')->get();
        return view('administradores.index', compact('administradores'));
    }

    /**
     * Muestra el formulario para crear un nuevo administrador.
     */
    public function create()
    {
        $usuarios = Usuario::doesntHave('administrador')->get(); // Usuarios sin administrador asociado
        return view('administradores.create', compact('usuarios'));
    }

    /**
     * Almacena un nuevo administrador en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id|unique:administradores,usuario_id',
            'cargo' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
        ]);

        Administrador::create($request->all());
        return redirect()->route('administradores.index')->with('success', 'Administrador creado exitosamente.');
    }

    /**
     * Muestra los detalles de un administrador.
     */
    public function show(Administrador $administrador)
    {
        return view('administradores.show', compact('administrador'));
    }

    /**
     * Muestra el formulario para editar un administrador.
     */
    public function edit(Administrador $administrador)
    {
        return view('administradores.edit', compact('administrador'));
    }

    /**
     * Actualiza un administrador en la base de datos.
     */
    public function update(Request $request, Administrador $administrador)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
        ]);

        $administrador->update($request->all());
        return redirect()->route('administradores.index')->with('success', 'Administrador actualizado exitosamente.');
    }

    /**
     * Elimina un administrador de la base de datos.
     */
    public function destroy(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('administradores.index')->with('success', 'Administrador eliminado exitosamente.');
    }
}

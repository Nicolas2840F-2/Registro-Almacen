<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = DB::table("roles")->get();

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcionRol' => 'required'
        ]);
        // Ejecutar la consulta SQL para reiniciar el contador de autoincremento a 1
        DB::statement('ALTER TABLE roles AUTO_INCREMENT = 1');

        Rol::create([
            'descripcionRol' => $request->descripcionRol

        ]);
        return to_route('rol.index')->with('status', 'Rol Registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $roles = DB::table("roles")->get();
        return $roles;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);
        $id = $request->idRol;
        $rol = Rol::find($id);
        $rol->update([
            'descripcionRol' => $request->descripcion
        ]);

        return redirect()->route('rol.index')->with('status', 'Rol Modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Verificar si el rol está siendo utilizado por algún usuario
        $rolEnUso = Usuario::where('rolUsuario', $id)->exists();

        if ($rolEnUso) {
            // Si el rol está en uso, redireccionar con un mensaje de error
            return redirect()->route('rol.index')->with('status', 'No se puede eliminar el rol porque está siendo utilizado por usuarios.');
        }

        // Si el rol no está siendo utilizado, proceder con la eliminación
        Rol::destroy($id);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('rol.index')->with('status', 'Rol Eliminado con éxito');
    }
}

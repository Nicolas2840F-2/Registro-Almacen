<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tipoDocumentoController extends Controller
{
    public function index()
    {

        $tipoDocumentos = DB::table("tipoDocumentos")->get();

        return view("tipoDocumentos.index", ['tipoDocumentos' => $tipoDocumentos]);
    }

    public function listarSelect()
    {
        $tipoDocumentos = DB::table("tipoDocumentos")->get();

        return view("registerUser", ['tipoDocumentos' => $tipoDocumentos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'descripcionTipoDocumento' => 'required'
        ]);

        DB::statement('ALTER TABLE tipoDocumentos AUTO_INCREMENT = 1');

        TipoDocumento::create([
            'descripcionTipoDocumento' => $request->descripcionTipoDocumento

        ]);
        return to_route('tipoDocumento.index')->with('status', 'Documento Registrado con éxito');
    }
    public function update(Request $request)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);

        $id = $request->idTipoDocumento;
        $tipoDocumento = TipoDocumento::find($id);
        $tipoDocumento->update([
            'descripcionTipoDocumento' => $request->descripcion
        ]);

        return redirect()->route('tipoDocumento.index')->with('status', 'Documento Modificado con éxito');
    }

    public function destroy($id)
    {
        // Verificar si el rol está siendo utilizado por algún usuario
        $tipoDocumentoEnUso = Usuario::where('tipoDocumentoUsuario', $id)->exists();

        if ($tipoDocumentoEnUso) {
            // Si el rol está en uso, redireccionar con un mensaje de error
            return redirect()->route('tipoDocumento.index')->with('status', 'No se puede eliminar el Tipo de documento porque está siendo utilizado por usuarios.');
        }

        // Si el rol no está siendo utilizado, proceder con la eliminación
        TipoDocumento::destroy($id);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('tipoDocumento.index')->with('status', 'Documento Eliminado con éxito');
    }

    public function show()
    {
        $tipoDocumentos = DB::table("tipoDocumentos")->get();

        return $tipoDocumentos;
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Portatil;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortatilController extends Controller
{

    public function index(){
        $portatiles = DB::table("portatiles")->get();

        return view("Portatiles.index", ["portatiles"=> $portatiles]);
    }


    private function checkDuplicateSerial($serialNumber)
    {
        // Lógica para verificar si el número de serie ya existe en la base de datos
        $existingPortatil = Portatil::where('númeroSeriePortatil', $serialNumber)->first();

        // Si el número de serie existe, retornar true; de lo contrario, retornar false
        return $existingPortatil !== null;
    }

    public function create(Usuario $usuario)
    {
        return view('Portatiles.create', ['usuario' => $usuario]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "marcaPortatil" => ["required", "string"],
            "especificacionesPortatil" => "",
            "colorPortatil" => ["required", "string"],
            "usuario" => ["required", "string"],
        ]);

        $user = Usuario::where('documentoUsuario', $request->usuario)->first();
        if ($user) {
            $numeroSerie = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);

            // Verificar si el número de serie ya existe
            if ($this->checkDuplicateSerial($numeroSerie)) {
                // Si ya existe, generar otro número y verificar nuevamente
                do {
                    $numeroSerie = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                } while ($this->checkDuplicateSerial($numeroSerie));
            }

            Portatil::create([
                "marcaPortatil" => $request->marcaPortatil,
                "númeroSeriePortatil" => $numeroSerie,
                "especificacionesPortatil" => $request->especificacionesPortatil,
                "colorPortatil" => $request->colorPortatil,
                "usuario" => $user->idUsuario,
            ]);

            return redirect()->route("registro.create")->with("status", "Portatil Registrado Exitosamente");
        } else {
            return back()->withInput()->withErrors(['usuario' => 'El usuario no está registrado']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class RegisterUsuarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tipoDocumentoUsuario' => ['required', 'string'],
            'documentoUsuario' => ['required', 'string', 'min:7', 'unique:usuarios'],
            'nombreUsuario' => ['required', 'string', 'max:100'],
            'telefonoUsuario' => ['required', 'string', 'max:10', 'min:10','unique:usuarios'],
            'email' => ['required', 'string', 'email','unique:usuarios'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        Usuario::create([
            'tipoDocumentoUsuario' => $request->tipoDocumentoUsuario,
            'documentoUsuario' => $request->documentoUsuario,
            'nombreUsuario' => $request->nombreUsuario,
            'telefonoUsuario' => $request->telefonoUsuario,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return to_route('login')->with('status', 'Cuenta creada');

        // return $request;

    }
}

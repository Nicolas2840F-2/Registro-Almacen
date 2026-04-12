<?php

namespace App\Http\Controllers;

use App\Models\Portatil;
use App\Models\Registro;
use App\Models\Usuario;
// use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = DB::table("usuarios")->get();

        return view("usuarios.index", ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show()
    {
        $tipoDocumentoController = new tipoDocumentoController();
        $tiposDocumento = $tipoDocumentoController->show();

        return view('usuarios.update', ['tipoDocumentos' => $tiposDocumento]);
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
    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            // 'tipoDocumentoUsuario' => ['required', 'string'],
            'documentoUsuario' => ['required', 'string', 'min:7'],
            'nombreUsuario' => ['required', 'string', 'max:100'],
            'telefonoUsuario' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $usuario->update($validated);

        return to_route('main.index')->with('status', 'Perfil editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function buscarByDocumento(Request $request)
    {

        $request->validate([
            'documentoUsuarioS' => ['required', 'numeric']
        ]);


        $usuario = Usuario::where('documentoUsuario', 'like', '%' . $request->documentoUsuarioS . '%')->first();

        if (!isset($usuario)) {
            throw ValidationException::withMessages([
                'documentoUsuarioS' => 'Usuario no encontrado',
            ]);
        }


        $portatiles = Portatil::where('usuario', $usuario->idUsuario)->get();
        $registros = Registro::where('usuario', $usuario->idUsuario)->orderBy('idRegistro', 'desc')->get();

        return view('Registros.create')->with(['usuario' => $usuario, 'portatiles' => $portatiles, 'registros' => $registros]);

    }
    public function buscarByDocument(Request $request)
    {

        // return json_encode($request->documentoUsuario, JSON_UNESCAPED_UNICODE);


        $usuarios = Usuario::join('tipoDocumentos', 'usuarios.tipoDocumentoUsuario', '=', 'tipoDocumentos.idTipoDocumento')
            ->where('documentoUsuario', 'like', '%' . $request->value . '%')
            ->get(['usuarios.*', 'tipoDocumentos.*']);

        $html = '';

        if ($usuarios->count() > 0) {
            foreach ($usuarios as $usuario) {


                //     <td class="relative">
                //     <span id="spanDocumento">1101752630</span>
                //     <div
                //         class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-fit top-12 z-50">
                //         <span class="comic-text w-fit text-left">
                //             <b>Nombre:</b> <br>
                //             Cristian Fernando Morales Diaz
                //         </span>
                //         <hr class="border-gray-800 m-1">
                //         <span class="comic-text w-fit text-left">
                //             <b>Documento:</b> <br>
                //             1101752630
                //         </span>
                //         <hr class="border-gray-800 m-1">
                //         <span class="comic-text w-fit text-left">
                //             <b>Correo:</b> <br>
                //             cfmorales.diaz@gmail.com
                //         </span>
                //     </div>
                // </td>

                $html .= '<tr>';
                $html .= '<td>' . $usuario->descripcionTipoDocumento . '</td>';
                $html .= '<td>' . $usuario->documentoUsuario . '</td>';
                $html .= '<td>' . $usuario->nombreUsuario . '</td>';
                $html .= '<td>' . $usuario->telefonoUsuario . '</td>';
                $html .= '<td>' . $usuario->email . '</td>';
                $html .= '</tr>';



                // $html .= '<tr>';

                //     $html .= '<td class="relative">';
                //         $html .= '<span id="spanLabel">'. $registro->documentoUsuario . '</span>';
                //         $html .= '<div class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-fit top-12 z-50">';
                //             $html .= '<div class="arrow-down absolute -top-5 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]"></div>';
                //             $html .= ;
                //         $html .= '</div';
                //     $html .= '</td>';

                //     $html .= '<td class="relative">' . $registro->marcaPortatil . ' --- ' . $registro->marcaPortatil . '</td>';
                //     $html .= '<td>' . $registro->fechaIngresoRegistro . '</td>';
                //     $html .= '<td>' . $registro->fechaSalidaRegistro . '</td>';
                // $html .= '</tr>';
            }
        } else {
            $html .= '<tr>';
            $html .= '<td colspan="4">No results</td>';
            $html .= '</tr>';
        }

        return json_encode($html, JSON_UNESCAPED_UNICODE);

    }

}

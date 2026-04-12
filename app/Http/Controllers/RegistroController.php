<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Registro::all();
        return view('Registros.index', ['registros' => $registros]);
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

        if (is_null($request->portatil)) {
            return redirect()->route('registro.create')->withErrors([
                'portatil' => 'Se debe tener almenos un portatil',
            ]);
        }

        $request->validate([
            'idUsuario' => ['required', 'int'],
            'portatil' => ['required'],
        ]);

        $lastRegistro = Registro::latest()->first();

        if ($lastRegistro && $lastRegistro->fechaSalidaRegistro == null) {
            return redirect()->route('registro.create')->withErrors([
                'documentoUsuario' => 'No hay registro de ultima salida',
            ]);
        }

        Registro::create([
            'usuario' => $request->idUsuario,
            'portatil' => $request->portatil,
            'fechaIngresoRegistro' => NOW(),
        ]);

        return to_route('registro.create')->with('status', 'Ingreso Registrado');

    }

    public function buscarByDocument(Request $request)
    {


        $registros = Registro::join('usuarios', 'registros.usuario', '=', 'usuarios.idUsuario')
            ->join('portatiles', 'registros.portatil', '=', 'portatiles.idPortatil')
            ->where($request->table . '.' . $request->input, 'like', '%' . $request->value . '%')
            ->get(['registros.*', 'usuarios.*', 'portatiles.*']);

        $html = '';

        if ($registros->count() > 0) {
            foreach ($registros as $registro) {
                $html .= '<tr>';
                $html .= '<td class="relative">';
                $html .= '<span id="spanLabel" class="cursor-pointer">' . $registro->documentoUsuario . '</span>';
                $html .= '<div class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-[250px] top-12 z-50">';
                $html .= '<div class="arrow-down absolute top-12 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]"></div>';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= ' <b>Nombre:</b> <br>';
                $html .= $registro->nombreUsuario;
                $html .= '</span>';
                $html .= '<hr class="border-gray-800 m-1">';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= '<b>Documento:</b> <br>';
                $html .= $registro->documentoUsuario;
                $html .= '</span>';
                $html .= '<hr class="border-gray-800 m-1">';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= '<b>Correo:</b> <br>';
                $html .= $registro->email;
                $html .= '</span>';
                $html .= '</div>';
                $html .= '</td>';

                $html .= '<td class="relative">';
                $html .= '<span id="spanLabel" class="cursor-pointer">' . $registro->númeroSeriePortatil . '</span>';
                $html .= '<div class="comic-box drop-shadow-2xl left-2/4 -translate-x-2/4 hidden flex-col absolute bg-white p-5 shadow-xl whitespace-nowrap max-w-[600px] min-w-[250px] top-12 z-50">';
                $html .= '<div class="absolute top-12 left-2/4 -translate-x-2/4 w-0 h-0 border-transparent border-solid border-l-[20px] border-r-[20px] border-b-white border-b-[20px]"></div>';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= ' <b>Marca:</b> <br>';
                $html .= $registro->marcaPortatil;
                $html .= '</span>';
                $html .= '<hr class="border-gray-800 m-1">';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= '<b>Color:</b> <br>';
                $html .= $registro->colorPortatil;
                $html .= '</span>';
                $html .= '<hr class="border-gray-800 m-1">';
                $html .= '<span class="comic-text w-full text-left">';
                $html .= '<b>Especificaciones:</b> <br>';
                $html .= $registro->especificacionesPortatil;
                $html .= '</span>';
                $html .= '</div>';
                $html .= '</td>';
                $html .= '<td>' . $registro->fechaIngresoRegistro . '</td>';
                $html .= '<td>' . $registro->fechaSalidaRegistro . '</td>';
                $html .= '</tr>';
            }
        } else {
            $html .= '<tr>';
            $html .= '<td colspan="4">No results</td>';
            $html .= '</tr>';
        }

        return json_encode($html, JSON_UNESCAPED_UNICODE);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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

        if (is_null($request->portatil)) {
            return redirect()->route('registro.create')->withErrors([
                'portatil' => 'Se debe tener almenos un portatil',
            ]);
        }


        $validated = $request->validate([
            'idUsuario' => ['required', 'int'],
            'portatil' => ['required'],
        ]);

        $lastRegistro = Registro::latest()->first();

        if ($lastRegistro && $lastRegistro->fechaIngresoRegistro != null && $lastRegistro->fechaSalidaRegistro != null) {
            return redirect()->route('registro.create')->withErrors([
                'documentoUsuario' => 'No hay registro de ingreso',
            ]);
        }

        $lastRegistro->update([
            "fechaSalidaRegistro" => NOW(),
        ]);

        return to_route('registro.create')->with('status', 'Salida Registrada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

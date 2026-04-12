<x-layouts.app title="Usuarios" meta-description="Historial de Usuarios">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <body style="background: #075985">
        <div style="height:calc(100% - 4rem);" class="main flex flex-col w-full p-10">
            <div class="title w-full h-[10%] flex items-center justify-center">
                <h1 class="w-full text-4xl text-white">Historial De Usuarios Registrados</h1>
            </div>

            <div class="main2 w-full h-[90%] mt-3 rounded-md px-4 pb-4 pt-3 bg-gray-200">
                <div class="buscar h-[10%] flex flex-row items-center w-full">
                    <input data-id="_token" type="hidden" value="{{ csrf_token() }}">
                    <input name="documentoUsuario" id="DocumentoUser" style="width:-webkit-fill-available"
                        class="h-4/5 border shadow-sm px-2" type="number" placeholder="N° Documento">
                </div>
                <div class="tabless w-full h-[90%] min-h-[80%] overflow-auto pt-6">
                    <table class="w-full min-w-full h-fit text-center shadow">
                        <thead class="sticky top-0 bg-gray-300 z-20">
                            <tr>
                                <th>Tipo de Documento</th>
                                <th>Documento de Identificación</th>
                                <th>Nombre Usuario</th>
                                <th>Telefono Usuario</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="TBodyUsuarios" class="min-w-[25px]">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</x-layouts.app>

{{-- <div class="usuario absolute  flex flex-col bg-blue-800 top-0">
    <span>
        <strong>nombre:</strong>
        Cristian Morales
    </span>
    <span>
        <strong>Documento:</strong>
        1101752630
    </span>
</div> --}}

{{-- @foreach ($registros as $registro) --}}
{{-- <tr> --}}
{{-- <td>{{ $registro->usuarioR->nombreUsuario }}</td> --}}
{{-- <td>{{ $registro->usuarioR->documentoUsuario }}</td> --}}
{{-- <td>{{ $registro->portatilR->marcaPortatil }} --- --}}
{{-- {{ $registro->portatilR->colorPortatil }}</td> --}}
{{-- <td>{{ $registro->fechaIngresoRegistro }}</td> --}}
{{-- <td>{{ $registro->fechaSalidaRegistro }}</td> --}}
{{-- </tr> --}}
{{-- @endforeach --}}

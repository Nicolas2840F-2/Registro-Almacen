<x-layouts.app title="Registro de Entradas" meta-description="Registro de Entradas">

    <body style="background: #075985">
        <div class="w-full flex justify-center">
            <div class="table w-1/3 bg-sky-600 text-center my-20 rounded-md shadow-xl shadow-slate-950/50">
                <div class="w-full flex justify-center ">
                    <img class="w-1/3" src="/Imagenes/user.png" alt="User">
                </div>
                <div class="w-full flex justify-center">
                    <form action ="{{ route('usuario.update', Auth::user()) }}" method="POST">
                        @csrf
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="text"
                            placeholder="Nombre" name="nombreUsuario"
                            value="{{ old('nombreUsuario', Auth::user()->nombreUsuario) }}">
                        {{-- <select class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" name="tipoDocumentoUsuario"
                            id="" value="{{ old('tipoDocumentoUsuario') }}">
                            @foreach ($tipoDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->idTipoDocumento }}">
                                    {{ $tipoDocumento->descripcionTipoDocumento }}</option>
                            @endforeach
                        </select> --}}
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Identificación" name="documentoUsuario"
                            value="{{ old('documentoUsuario', Auth::user()->documentoUsuario) }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Telefono" name="telefonoUsuario"
                            value="{{ old('telefonoUsuario', Auth::user()->telefonoUsuario) }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="email"
                            placeholder="Correo" name="email" value="{{ old('email', Auth::user()->email) }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Nueva Contraseña" name="password">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Confirmar contraseña" name="password_confirmation">
                        <button
                            class="mb-7 w-5/6 p-3 rounded-md m-2 bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800"
                            type="submit">Guardar</button>
                    </form>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>

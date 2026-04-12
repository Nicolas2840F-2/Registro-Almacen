<x-layouts.app title="Register" meta-description="Register">

    <body style="background: #075985">
        <div class="w-full flex justify-center">
            <div class="table w-1/3 bg-sky-600 text-center my-20 rounded-md shadow-xl shadow-slate-950/50">
                <div class="w-full flex justify-center ">
                    <img class="w-1/3" src="/Imagenes/user.png" alt="User">
                </div>
                <div class="w-full flex justify-center">
                    <form action ="{{ route('usuario.store') }}" method="POST">
                        @csrf
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="text"
                            placeholder="Nombre" name="nombreUsuario" value="{{ old('nombreUsuario') }}">
                        <select class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" name="tipoDocumentoUsuario"
                            id="" value="{{ old('tipoDocumentoUsuario') }}">
                            @foreach ($tipoDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->idTipoDocumento }}">
                                    {{ $tipoDocumento->descripcionTipoDocumento }}</option>
                            @endforeach
                        </select>
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Identificación" name="documentoUsuario" value="{{ old('documentoUsuario') }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="number"
                            placeholder="Telefono" name="telefonoUsuario" value="{{ old('telefonoUsuario') }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="email"
                            placeholder="Correo" name="email" value="{{ old('email') }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Contraseña" name="password">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Confirmar contraseña" name="password_confirmation">
                        <button
                            class="w-5/6 p-3 rounded-md m-2 bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800"
                            type="submit">Registrar</button>
                        <div class="w-full text-slate-50 links">
                            <a href="{{ route('reset') }}" class="hover:underline hover:text-sky-100">¿Perdiste tu
                                Contraseña?</a>
                        </div>
                        <div class="w-full pb-12 text-slate-50 links">
                            <a href="{{ route('login') }}" class="hover:text-sky-100">¿Ya tienes Cuenta?
                                <label style="cursor: pointer" class="hover:underline">Iniciar Sesion</label>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>

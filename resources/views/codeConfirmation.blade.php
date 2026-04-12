<x-layouts.app title="Codigo">

    <body style="background: #075985">
        <div class="w-full flex justify-center text-center">
            <div class="table w-1/3 bg-sky-600 my-20 rounded-md shadow-xl shadow-slate-950/50">
                <div class="w-full flex justify-center"><img class="w-1/4 m-4" src="/Imagenes/candado.png" alt="candado">
                </div>
                <h1 class="text-2xl font-semibold mb-4 mt-4 text-slate-50 tituloReset">Restablecer Contraseña</h1>
                <div class="text-zinc-50 mb-4 mt-4  font-medium">
                    <p>Ingresa el código que te enviamos</p>
                    <p> al correo que ingresaste, Recuerda revisar el spam</p>
                </div>
                <div class="w-full flex justify-center">
                    <form action="{{ route('password.code') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ request('email') }}">
                        <input class="w-3/5 p-3 rounded-md mb-4 mt-4 focus:outline-none caja text-center" type="number"
                            placeholder="Ingresa el codigo de 6 digitos" name="reset_code" pattern="\d{6}"
                            maxlength="6">
                        @error('reset_code')
                            <br>
                            <p>{{ $message }}</p>
                            <br>
                        @enderror
                        <button
                            class="w-3/5 p-3 rounded-md bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800 mb-12">Validar
                            código de inicio de Sesion</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-layouts.app>

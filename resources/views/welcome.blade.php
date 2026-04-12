<x-layouts.app title="Login" meta-description="Login meta description">

    <body style="background: #075985">
        <div class="w-full flex justify-center">
            <div class="table w-1/3 bg-sky-600 text-center my-20 rounded-md shadow-xl shadow-slate-950/50">
                <h1 class="titulo-principal text-slate-50">Bienvenido</h1>
                <div class="w-full flex justify-center">
                    <form action ="{{ route('login.store') }}" method="POST">
                        @csrf
                        <input id="fDocumento" class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="text"
                            placeholder="Identificación" name="documentoUsuario" value="{{ old('documentoUsuario') }}"
                            required minlength="8">
                        <input id="fpassword" class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="password"
                            placeholder="Contraseña" name="password" required>
                        <button id="fEnviar"
                            class="w-5/6 p-3 rounded-md m-2 bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800"
                            type="submit">Login</button>
                        <div class="w-full text-slate-50 links">
                            <a href="{{ route('reset') }}" class="hover:underline hover:text-sky-100">¿Perdiste tu
                                Contraseña?</a>
                        </div>
                        <div class="w-full pb-12 text-slate-50 links">
                            <a href="{{ route('register') }}" class="hover:text-sky-100">¿No tienes Cuenta?
                                <label style="cursor: pointer" class="hover:underline">Registrate</label>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-layouts.app>

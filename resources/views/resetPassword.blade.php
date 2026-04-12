<x-layouts.app title="Recuperar Contraseña">

    <body style="background: #075985">
        <div class="w-full flex justify-center text-center">
            <div class="table w-1/3 bg-sky-600 my-20 rounded-md shadow-xl shadow-slate-950/50">
                <div class="w-full flex justify-center"><img class="w-1/4 m-4" src="/Imagenes/candado.png" alt="candado">
                </div>
                <h1 class="text-2xl font-semibold mb-4 mt-4 text-slate-50 tituloReset">¿Tienes problemas para Iniciar
                    Sesión?</h1>
                <div class="text-zinc-50 mb-4 mt-4  font-medium">
                    <p>Ingresa tu correo electrónico</p>
                    <p>y te enviaremos un código</p>
                    <p>para que recuperes el acceso a tu cuenta</p>
                </div>
                <div class="w-full flex justify-center">
                    <form action="{{ route('password.send') }}" method="POST">
                        @csrf
                        <input class="w-3/5 p-3 rounded-md mb-4 mt-4 focus:outline-none caja" type="email"
                            placeholder="Ingresa tu correo electrónico" name="email">
                        @error('email')
                        <br>
                            <p>{{ $message }}</p>
                        <br>
                        @enderror
                        <button
                            class="w-3/5 p-3 rounded-md bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800 mb-12">Enviar
                            código para recuperar acceso</button>
                    </form>
                </div>
                <div class="flex justify-center items-center mb-4">
                    <hr class="w-1/3">
                    <p class="w-1/6 text-zinc-50 font-medium">O</p>
                    <hr class="w-1/3">
                </div>
                <div class="text-zinc-50 font-medium links mb-20">
                    <a href="{{ route('register') }}">Crear cuenta nueva</a>
                </div>
                <div class="text-zinc-50 font-medium p-4 border-solid border-t-2 border-slate-50">
                    <a href="{{ route('login') }}">Volver al inicio de sesión</a>
                </div>
            </div>
        </div>
    </body>

</x-layouts.app>

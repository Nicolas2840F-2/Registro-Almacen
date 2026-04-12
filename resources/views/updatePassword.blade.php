<x-layouts.app title="Update">
    <body style="background: #075985">
        <div class="w-full flex justify-center">
            <div class="table w-1/3 bg-sky-600 text-center my-20 rounded-md shadow-xl shadow-slate-950/50">
                <h1 class="titulo-principal text-slate-50">Ingrese una contraseña Nueva</h1>
                <div class="w-full flex justify-center">
                    <form action ="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ request('email') }}">
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="Contraseña" name="password">
                        @error('password')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="w-5/6 p-3 rounded-md m-2 focus:outline-none caja" type="Password"
                            placeholder="confirmar contraseña" name="password_confirmation">
                        <button
                            class="w-5/6 p-3 rounded-md m-2 bg-sky-200 font-medium hover:text-slate-50 hover:bg-sky-800 mb-20"
                            type="submit">Actualizar Contraseña</button>
                    </form>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>

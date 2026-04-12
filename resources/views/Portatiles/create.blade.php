<x-layouts.app title="Portatiles" meta-description="CRUD para Portatiles">

    <body style="background: #075985">
        <div class="w-full justify-center flex ">
            <div class="flex my-20 bg-slate-50 w-4/5 h-full rounded-lg principal">
                <div class="w-1/2 flex items-center justify-center">
                    <img class="w-4/5" src="/Imagenes/icono-pc.png" alt="pc">
                </div>
                <div class="w-1/2 block p-4 mt-4">
                    <div class="w-full p-4 text-center">
                        <h1 class="text-5xl font-bold">Registro de Portatiles</h1>
                    </div>
                    <div class="text-2xl text-slate-600 font-semibold mb-8 text-center">
                        <p>Ingrese los datos del portátil a registrar</p>
                    </div>
                    <form action="{{ route('portatil.store') }}" method="POST">
                        @csrf
                        <label class="font-semibold text-2xl">Marca</label>
                        <br>
                        <input class="rounded border mt-2 mb-2 p-1 w-2/3" type="text" name="marcaPortatil"
                            placeholder="Ej: Hp, Lenovo.,etc." value="{{ old('marcaPortatil') }}">
                        {{-- @error('marcaPortatil')
                            <br>
                            {{ $message }}
                            <br>
                        @enderror --}}
                        <br>
                        <label class="font-semibold text-2xl">Especificaciones del Portátil(Opcional)</label>
                        <br>
                        <input class="rounded border mt-2 mb-2 p-1 w-2/3" type="text"
                            placeholder="Ej: Procesador, Ram, Gráficos.,etc." name="especificacionesPortatil"
                            value="{{ old('especificacionesPortatil') }}">
                        <br>
                        <label class="font-semibold text-2xl">Color</label>
                        <br>
                        <input class="rounded border mt-2 mb-2 p-1 w-2/3" type="text"
                            placeholder="Ej: Gris,Azul,Blanco,etc." name="colorPortatil"
                            value="{{ old('colorPortatil') }}">
                        {{-- @error('colorPortatil')
                            <br>
                            {{ $message }}
                            <br>
                        @enderror --}}
                        <br>
                        <label class="font-semibold text-2xl">Identificación del Dueño</label>
                        <br>
                        <input class="rounded border mt-2 mb-2 p-1 w-2/3" type="number" placeholder="Ej: 63436531"
                            name="usuario" value="{{ old('documentoUsuario', isset($usuario) ? $usuario->documentoUsuario : '') }}">
                        {{-- @error('usuario')
                            <br>
                            {{ $message }}
                            <br>
                        @enderror --}}
                        <br>
                        <div class="flex justify-center mt-6">
                            <button class="bg-sky-800 p-2 rounded-md w-1/3 text-slate-50 font-semibold hover:bg-sky-950" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>
</x-layouts.app>

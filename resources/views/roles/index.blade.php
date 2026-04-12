<x-layouts.app title="Roles" meta-description="Registro y modificación de roles">

    <body style="background: #075985">
        <div class="flex justify-center items-center">
            <div class="bg-slate-50 my-20 flex justify-center items-center p-4">
                <div class="w-1/2 inline">
                    <div class="w-full inline justify-center">
                        <h1 class="w-full text-5xl font-bold text-center my-4">Registro de Roles</h1>
                        <div class="text-2xl text-slate-600 font-semibold mb-6 text-center">
                            <p>Ingrese la descripción del rol a registrar</p>
                        </div>
                        <div class="flex justify-center text-center">
                            <form action="{{ route('rol.store') }}" method="POST">
                                @csrf
                                <label class="font-semibold text-2xl">Descripción</label>
                                <input class="rounded border p-1 w-full mt-4" type="text" name="descripcionRol"
                                    placeholder="Ej: User, Admin, Encargado, etc.">
                                <div class="flex justify-center mt-4">
                                    <button
                                        class="bg-sky-800 p-2 rounded-md w-2/3 text-slate-50 font-semibold hover:bg-sky-950"
                                        type="submit">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="w-full flex justify-center my-4">
                        <img class="w-1/2" src="/Imagenes/icono-rol.png" alt="rol">
                    </div>
                </div>
                <div class="w-1/2">
                    <table class="border-slate-400 bg-slate-150">
                        <tr class="text-center bg-slate-200">
                            <td class="w-1/6  font-bold">Id</td>
                            <td class="w-1/3  font-bold">Descripción</td>
                            <td class="w-1/3  font-bold">Opción</td>
                        </tr>
                        @foreach ($roles as $rol)
                            <tr>
                                <form action="{{ route('rol.update') }}" method="POST">
                                    @csrf
                                    <td class="w-1/6 text-center font-medium"><input class="w-1/5 bg-slate-50" type="number" value="{{ $rol->idRol }}" name="idRol" readonly></td>
                                    <td class="w-1/3 font-medium"><input class="w-full text-center bg-slate-50" type="text" value="{{ $rol->descripcionRol }}" name="descripcion">
                                    </td>
                                    <td class="font-bold text-slate-950 flex w-full border-none">
                                        <button class="bg-sky-800 m-1 p-1 rounded-md w-1/2 text-slate-50 font-semibold hover:bg-sky-950" type="submit">Modificar</button>
                                </form>
                                <form class="w-1/2 m-1" action="{{ route('rol.destroy', $rol->idRol) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-sky-800 p-1 rounded-md w-full text-slate-50 font-semibold hover:bg-sky-950" type="submit">Eliminar</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</x-layouts.app>

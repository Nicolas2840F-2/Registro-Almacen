<nav class="nav w-4/5 flex flex-row justify-evenly">
    <div class="group text-black cursor-pointer relative p-3 text-xl rounded hover:text-gray-600">
        <span
            class="h-full flex items-center {{ request()->routeIs('registro.*') ? 'text-blue-700' : 'text-black' }}">Registros</span>
        <div
            class="menu group-hover:flex hidden top-14 absolute left-0 bg-white content-center items-center w-fit rounded py-3 px-5 cursor-default whitespace-nowrap">
            <ul class="flex flex-col w-full p-0 m-0">
                <li class="list-none my-1 mx-0 text-center">
                    <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300 {{ request()->routeIs('registro.create') ? 'text-blue-700' : 'text-black' }}"
                        href="{{ route('registro.create') }}">
                        Registrar
                    </a>
                </li>
                <li class="list-none my-1 mx-0 text-center">
                    <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300 {{ request()->routeIs('registro.index') ? 'text-blue-700' : 'text-black' }}"
                        href="{{ route('registro.index') }}">
                        Historial
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{--  --}}
    <div class="group text-black cursor-pointer relative p-3 text-xl rounded hover:text-gray-600">
        <span
            class="h-full flex items-center {{ request()->routeIs('portatil.*') ? 'text-blue-700' : 'text-black' }}">Portatiles</span>
        <div
            class="menu group-hover:flex hidden top-14 absolute left-0 bg-white content-center items-center w-fit rounded py-3 px-5 cursor-default whitespace-nowrap">
            <ul class="flex flex-col w-full p-0 m-0">
                <li class="list-none my-1 mx-0 text-center">
                    <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300 {{ request()->routeIs('portatil.create') ? 'text-blue-700' : 'text-black' }}"
                        href="{{ route('portatil.create') }}">Registrar</a>
                </li>
                <li class="list-none my-1 mx-0 text-center">
                    <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300 {{ request()->routeIs('portatil.index') ? 'text-blue-700' : 'text-black' }}"
                        href="{{ route('portatil.index') }}">Listar</a>
                </li>
            </ul>
        </div>
    </div>

    @if(Auth::user()->rolUsuario == 3)
        {{--  --}}
        <div class="group text-black cursor-pointer relative p-3 text-xl rounded hover:text-gray-600">
            <span
                class="h-full flex items-center {{ request()->routeIs('usuario.*') ? 'text-blue-700' : 'text-black' }}">Usuarios</span>
            <div
                class="menu group-hover:flex hidden top-14 absolute left-0 bg-white content-center items-center w-fit rounded py-3 px-5 cursor-default whitespace-nowrap">
                <ul class="flex flex-col w-full p-0 m-0">
                    <li class="list-none my-1 mx-0 text-center">
                        <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300"
                            href="{{ route('register') }}">Registrar</a>
                    </li>
                    <li class="list-none my-1 mx-0 text-center">
                        <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300
                    {{ request()->routeIs('usuario.index') ? 'text-blue-700' : 'text-black' }}"
                            href="{{ route('usuario.index') }}">Listar</a>
                    </li>
                </ul>
            </div>
        </div>
        {{--  --}}
        <div class="group text-black cursor-pointer relative p-3 text-xl rounded hover:text-gray-600">
            <span
                class="h-full flex items-center {{ request()->routeIs('rol.*') || request()->routeIs('tipoDocumento.*') ? 'text-blue-700' : '' }}">Complementos</span>
            <div
                class="menu group-hover:flex hidden top-14 absolute left-0 bg-white content-center items-center w-fit rounded py-3 px-5 cursor-default whitespace-nowrap">
                <ul class="flex flex-col w-full p-0 m-0">
                    <li class="list-none my-1 mx-0 text-center">
                        <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300
                    {{ request()->routeIs('rol.index') ? 'text-blue-700' : 'text-black' }}"
                            href="{{ route('rol.index') }}">Roles</a>
                    </li>
                    <li class="list-none my-1 mx-0 text-center">
                        <a class="text-black cursor-pointer hover:text-blue-700 transition-colors duration-300
                    {{ request()->routeIs('tipoDocumento.index') ? 'text-blue-700' : 'text-black' }}"
                            href="{{ route('tipoDocumento.index') }}">Tipos de documentos</a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</nav>

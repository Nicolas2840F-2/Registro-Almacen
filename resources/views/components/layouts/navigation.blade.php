<nav class="border-solid w-full h-16 flex justify-start pl-2" style="background: white;">
    <a class="w-[15%]" href="{{ route('main.index') }}">
        <img class="w-full h-full" src="/Imagenes/logo-NicoFer.png" alt="logo">
    </a>
    @if (!request()->routeIs('login', 'welcome', 'reset', 'register', 'password.reset', 'password.verify'))
        <x-layouts.nav />
        <div class="contenedor_menu h-full w-[5%] select-none flex items-center justify-center text-4xl">
            <div
                class="button flex flex-col justify-center items-center w-[65%] h-[65%] rounded-md cursor-pointer gap-[7px] border">
                <span class="line relative w-[70%] h-[4px] bg-black rounded"></span>
                <span class="line relative w-[70%] h-[4px] bg-black rounded"></span>
                <span class="line relative w-[70%] h-[4px] bg-black rounded"></span>
            </div>
            <div
                class="ventana fixed z-50 -right-64 top-[8%] bg-white p-4 opacity-0 invisible rounded-tl-lg rounded-bl-lg w-fit">
                <hr>
                <span class="block w-full text-lg">{{ Auth::user()->rol->descripcionRol }}</span>
                <span class="block w-full text-xl">{{ Auth::user()->nombreUsuario }}</span>
                <hr>
                <div class="nav h-fit">
                    <ul class="m-0 p-0 w-full mt-4">
                        <li class="list-none w-full h-fit">
                            <a class="block w-full text-center text-xl text-black py-2 rounded-md bg-gray-100 hover:bg-gray-300"
                                href="{{ route('user.edit') }}">
                                Editar Perfil
                            </a>
                        </li>
                        <li class="list-none w-full mt-4">
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <button
                                    class="block w-full text-center text-xl text-black py-2 rounded-md bg-gray-100 hover:bg-gray-300">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</nav>

<x-layouts.app title="MainView" meta-description="MainView">

    <body style="background: #075985">
        <div style="height: calc(100% - 4rem)" class="flex flex-col justify-center items-center">
            <h1 class="text-6xl">¡Hola {{ Auth::user()->nombreUsuario }}!</h1>
            <h1 class="mt-4 text-3xl">Bienvenido/a a nuestro sitio web.</h1>
        </div>
    </body>
</x-layouts.app>

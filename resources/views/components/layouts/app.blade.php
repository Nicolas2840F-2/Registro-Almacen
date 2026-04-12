<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
    <title>{{ $title ?? 'Defaul title' }}</title>
    @vite(['resources/css/app.scss', 'resources/js/nav-modal.js', 'resources/css/nav-modal.scss'])


    @if (request()->routeIs('usuario.index'))
        @vite('resources/js/buscar.js')
    @else
        @vite('resources/js/app.js')
    @endif


</head>
<x-layouts.navigation />
{{ $slot }}
<x-layouts.Modal />

</html>

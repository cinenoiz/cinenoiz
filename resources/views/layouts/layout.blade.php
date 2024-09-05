<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        @yield('css')
        @yield('style')
    </head>
    <body>
        <div class="main-container">

            @include('partials.navbar')

            @yield('conteudo')

            @include('partials.footer')

            @yield('scripts')
        </div>
    </body>
</html>

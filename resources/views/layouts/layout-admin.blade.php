<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('titulo')</title>


        <link rel="stylesheet" href="{{ asset('css/nav-admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        @yield('css')
        @yield('style')
    </head>
    <body>
        <div class="main-container">

            @include('partials.navbar-adm')

            <div id="conteudo">
                @yield('conteudo')
            </div>


        </div>


        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        @include('modals.alert-modal')


        @yield('scripts')
    </body>
</html>

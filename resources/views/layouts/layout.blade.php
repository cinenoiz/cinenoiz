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

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/leaflet.js') }}"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        @yield('css')
        @yield('style')
    </head>
    <body>
        <div class="main-container">

            @include('partials.navbar')

            @yield('conteudo')


            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            @yield('scripts')
        </div>
    </body>
</html>

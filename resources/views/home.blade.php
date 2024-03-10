<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="shortcut icon" href="/images/icon_no_text.svg" type="image/x-icon">

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    </head>
    <body>

        <section id="navbar">
            <header>
                <a href="/" class="logo">
                    <img src="/images/text_logo.svg" alt="Logo CineNóiz">
                </a>
                <div class="bx bx-menu" id="menu-icon"></div>

                <ul class="navbar">
                    <li><a class="active" href="#">Home</a></li>
                    <li><a href="#">Filmes</a></li>
                    <li><a href="#">Pré Vendas</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li class="login_sm"><a href="#">Login</a></li>
                </ul>

                <a href="#" class="btn">Login</a>
            </header>

        </section>

        <section id="banner" class="banner swiper">

            <div class="swiper-wrapper">

                @foreach($filmesDestaque as $filme)
                    <div class="swiper-slide container">
                        <img src="{{ $filme['banner'] }}" alt="{{ $filme['titulo'] }}">
                        <div class="banner-text">
                            <span>{{ $filme['producao'] }}</span>
                            <h1>{{ $filme['titulo'] }}</h1>
                            <a href="#" class="btn">Garantir Ingresso</a>
                        </div>

                    </div>
                @endforeach

            </div>

            <div class="swiper-pagination"></div>

        </section>

        <!-- BoxIcons -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <!-- Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- CustomJS -->
        <script src="/js/swiper.js"></script>
        <script src="/js/home.js"></script>
    </body>
</html>

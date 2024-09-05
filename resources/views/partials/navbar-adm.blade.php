<div id="navbar-adm">

    <span class="divider-span">
        <a href="{{ url('/') }}" class="link-nav">
            <img class="img-nav" src="{{ asset('logotipos/icon_no_text.svg') }}">
        </a>
    </span>

    <span class="divider-span">
        <a href="{{ url('/admin/') }}" class="link-nav {{ request()->is('admin') ? 'active' : '' }}">
            <img class="img-nav" src="{{ asset('icons/home.png') }}">
        </a>
        <a href="{{ url('/admin/cadastro/') }}" class="link-nav {{ request()->is('admin/cadastro*') ? 'active' : '' }}">
            <img class="img-nav" src="{{ asset('icons/add.png') }}">
        </a>
        <a href="{{ url('/admin/visualizar/') }}" class="link-nav {{ request()->is('admin/visualizar*') ? 'active' : '' }}">
            <img class="img-nav" src="{{ asset('icons/search.png') }}">
        </a>
        <a href="{{ url('/admin/localizacao/') }}" class="link-nav {{ request()->is('admin/localizacao*') ? 'active' : '' }}">
            <img class="img-nav" src="{{ asset('icons/mapa.png') }}">
        </a>
        <a href="{{ url('/admin/configuracao/') }}" class="link-nav {{ request()->is('admin/configuracao*') ? 'active' : '' }}">
            <img class="img-nav" src="{{ asset('icons/settings.png') }}">
        </a>
    </span>

    <span class="divider-span">
        <a href="{{ url('/logout') }}" class="link-nav">
            <img class="img-nav" src="{{ asset('icons/logout.png') }}">
        </a>
    </span>

</div>

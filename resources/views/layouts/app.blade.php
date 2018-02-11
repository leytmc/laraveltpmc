<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MCBLOG') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    @yield('css')
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'MCBLOG') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @admin
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle{{ currentRoute( route('category.create') )}}" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('Administration')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                    <a class="dropdown-item" href="{{ route('category.create') }}">
                        <i class="fa fa-plus fa-lg"></i> @lang('Ajouter une catégorie')
                    </a>
                </div>
            </li>
            @endadmin    
            </ul>
            <ul class="navbar-nav ml-auto">                
            @guest
                <li class="nav-item{{ currentRoute(route('login')) }}"><a class="nav-link" href="{{ route('login') }}">@lang('Connexion')</a></li>
                <li class="nav-item{{ currentRoute(route('register')) }}"><a class="nav-link" href="{{ route('register') }}">@lang('Inscription')</a></li>
            @else
                <li class="nav-item">
                    <span class="mr-2">Bienvenue {{ Auth::user()->name }}</span>
                    <a id="logout" class="link" href="{{ route('logout') }}">@lang('Déconnexion')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
<script>
    $(function() {
        $('#logout').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit()
        })
    })
</script>
</body>
</html>
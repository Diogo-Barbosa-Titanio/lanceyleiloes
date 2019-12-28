<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('/storage/images/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Materialize CSS -->
    <link href="{{ asset('/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- Materialize CSS -->
    <link href="{{ asset('/css/materialize_custom.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    @hasSection('styles')
        @yield('styles')
    @endif

</head>
<body>

<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <header class="topo">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <a href="{{url('/')}}">
                        <img src="{{asset('storage/images/logo.png')}}" alt="Lancey Leilões">
                    </a>
                </div>
                <div class="col-xl-3">

                </div>
                <div class="col-xl-6">
                    <ul class="nav justify-content-around menu">
                        <li class="nav-item">
                            <a href="{{url('/')}}/login">
                                <span class="icone"><i class="fas fa-user-circle"></i></span>
                                <span class="texto">Faça seu login</span>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{url('/')}}/pessoa_fisica"><span class="texto">Cadastre-se</span></a>
                        </li>
                        <li class="nav-item"><a href="{{url('/')}}/quem_somos"><span class="texto">Quem Somos</span></a></li>
                        <li class="nav-item"><a href="#"><span class="texto">Faq</span></a></li>
                        <li class="nav-item"><a href="#"><span class="texto">Fale Conosco</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <main role="main">

        @yield('content')

    </main>


    <footer>

        <div class="container pt-4 pb-5">
            <div class="row">
                <div class="col-xl-8">
                    <h6 class="fonte-cor-secundaria">Newsletter</h6>
                    <p>Cadastre-se para receber as novidades.</p>
                    <form id="form_newslleter" class="d-flex justify-content-middle">
                        <div class="d-inline-block">
                            <input type="email" name="email" class="form-control email" placeholder="Email">
                        </div>
                        <div class="d-inline-block">
                            <button class=" btn btn-cor-secundaria ml-1 mr-1">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-2">
                    <h6 class="fonte-cor-secundaria">Informações</h6>
                    <ul>
                        <li><a href="{{url('/')}}/quem_somos">Quem Somos</a></li>
                        <li><a href="{{url('/')}}">Termos de uso</a></li>
                        <li><a href="{{url('/')}}">Perguntas Frequentes</a></li>
                        <li><a href="{{url('/')}}">Fale Conosco</a></li>
                    </ul>
                </div>
                <div class="col-xl-2">
                    <h6 class="fonte-cor-secundaria">Minha Conta</h6>
                    <ul>
                        <li><a href="{{url('/')}}/pessoa_fisica">Cadastre-se</a></li>
                        <li><a href="{{url('/')}}/login">Login</a></li>
                        <li><a href="{{url('/')}}">Esqueci minha senha</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row copyright">
                <div class="col-xl text-center pt-3 pb-5">
                    <div>Uma empresa do grupo <i class="icone_brasilbrokers"></i></div>
                    <div class="linha_branca_footer mt-1 mb-1"></div>
                    <div>2019 Copyright Brasil Brokers. Todos os direitos reservados</div>
                </div>
            </div>
        </div>

    </footer>

</div>

<!-- Bootstrap JS, JQuery and Core plugin JavaScript -->
<script src="{{ asset(mix('/js/app.js')) }}"></script>

@hasSection('scripts')
    @yield('scripts')
@endif

</body>
</html>

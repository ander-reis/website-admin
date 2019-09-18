<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    {{--Drag and Drop--}}
    <link href="{{ asset('css/drag-drop.css') }}" rel="stylesheet">

    {{-- Highcharts --}}
    <script src="{{ asset('js/highcharts.js') }}"></script>
</head>
<body>
<div id="app">
    @auth()
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown mx-3 {{ active('admin.noticias.*') }} {{ active('admin.categorias.*') }} {{ active('admin.ordem-noticias.*') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notícias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.noticias.index') }}">
                                    Notícias
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.ordem-noticias.index') }}">
                                    Ordem Notícias
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.noticias-categoria.index') }}">
                                    Categorias
                                </a>
                            </div>
                        </li>

                        <li class="nav-item {{ active('admin.slider.*') }}">
                            <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
                        </li>

                        <li class="nav-item {{ active('admin.owl-carousel.*') }}">
                            <a class="nav-link" href="{{ route('admin.owl-carousel.index') }}">Owl Carousel</a>
                        </li>

                        <li class="nav-item dropdown mx-3 {{ active('admin.convencao.*') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Convênções e Acordos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 2]) }}">Educação Básica</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 1]) }}">Ensino Superior</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 9]) }}">PUC-SP</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 3]) }}">Sesi</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 4]) }}">Senai</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 5]) }}">Senai Superior</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 6]) }}">Senac</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 8]) }}">Mackenzie</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.convencao.index', ['convencao' => 7]) }}">Ensino Supletivo</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administração de Conteúdo
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Acontece</a>
                                <a class="dropdown-item" href="#">Atendimento on-line</a>
                                <a class="dropdown-item" href="{{ route('admin.paginas.index') }}">Conteúdo Geral</a>
                                <a class="dropdown-item" href="#">Convênios Diversos</a>
                                <a class="dropdown-item" href="#">Cursos</a>
                                <a class="dropdown-item" href="#">Guia de Consultas</a>
                                <a class="dropdown-item" href="{{ route('admin.home-page.index') }}">Home</a>
                                <a class="dropdown-item" href="#">Inscrição Colônia de Férias - SINPRO Osasco</a>
                            </div>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nome }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    {{ __('Configuração') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth

    <div class="container mt-3 mb-3">
        @yield('content')
    </div>
</div>
{{-- Scripts --}}
<script src="{{ asset('js/admin.js') }}"></script>

{{-- ToastJS --}}
@toastr_css
@toastr_js
@toastr_render

{{-- Unisharp --}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
        $('#ds_texto').ckeditor();
        $("input[maxlength]").maxlength();
    });
</script>

@stack('preview-script')
</body>
</html>

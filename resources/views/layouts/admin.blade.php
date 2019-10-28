<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="cache-control" content="no-cache">

    <meta name="robots" content="noindex, nofollow">

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

    {{-- Form Validation --}}
    <link href="{{ asset('css/formValidation.min.css') }}" rel="stylesheet">

    {{-- Highcharts --}}
    <script src="{{ asset('js/highcharts.js') }}"></script>
</head>

<body>
    <div id="app">
        @auth()
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li
                            class="nav-item dropdown mx-3 {{ active('admin.intro.*') }} {{ active('admin.slider.*') }} {{ active('admin.owl-carousel.*') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.home-page.index') }}">Home</a>
                                <a class="dropdown-item" href="{{ route('admin.intro.index') }}">Intro</a>
                                <a class="dropdown-item" href="{{ route('admin.slider.index') }}">Slider</a>

                                {{-- <a class="dropdown-item" href="{{ route('admin.owl-carousel.index') }}">Owl
                                Carousel</a> --}}
                            </div>
                        </li>

                        <li
                            class="nav-item dropdown mx-3 {{ active('admin.noticias.*') }} {{ active('admin.categorias.*') }} {{ active('admin.ordem-noticias.*') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notícias
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.noticias-categoria.index') }}">
                                    Categorias
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.noticias.index') }}">
                                    Notícias
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.ordem-noticias.index') }}">
                                    Ordem Notícias
                                </a>
                            </div>
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

                        <li class="nav-item dropdown mx-3 {{ active('admin.paginas-principais.*') }} {{ active('admin.boletim-cadastro.*') }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administração de Conteúdo
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.paginas-principais.index') }}">
                                    Conteúdo Geral
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.boletim-cadastro.index') }}">
                                    Cadastrar Boletim
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown mx-3 {{ active('admin.paginas-principais.*') }} {{ active('admin.boletim-cadastro.*') }}">
                            <a class="nav-link" href="{{ route('admin.instrucoes.index') }}" target="_blank">
                                Instruções
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
{{--                                <a class="dropdown-item" href="">--}}
{{--                                    {{ __('Configuração') }}--}}
{{--                                </a>--}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    {{-- CKEditor --}}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

    {{-- Form Validation --}}
    <script src="{{ asset('js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('js/Bootstrap.min.js') }}"></script>

    @include('ckfinder::setup')
    @stack('preview-script')

    <script type="text/javascript">
        $(document).ready(function () {
        bsCustomFileInput.init();
        $('#ds_texto').ckeditor({
            // Use named CKFinder browser route
	        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
	        // Use named CKFinder connector route
	        filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'
        });
        $("input[maxlength]").maxlength();
        // $("#preloaders").fadeOut(2000);
    });
    </script>
</body>

</html>

@extends('layouts.admin')

@section('content')
    {{--stylesheet website--}}
    <link href="{{ asset('css/website.css') }}" rel="stylesheet">
    <div class="main">
        {{--botao voltar--}}
        <div class="col mb-5">
            <a href="javascript:history.go(-1)" class="btn btn-danger" title="Voltar página anterior">Voltar</a>
            <hr>
        </div>
        {{--botao voltar end--}}

        {{--destaque--}}
        <div class="row">
            <div class="col-lg-5 mb-3">
                {{--slider--}}
                <div>
                    <div id="carousel-sinpro" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $slider)
                                <li data-target="#carousel-sinpro" data-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->index == 0 ? 'active' : ''}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
                                    <a href={!! $slider->ds_link !!}>
                                        <div class="gradient_img">
                                            <img class="d-block w-100"
                                                 src="{{ asset('/layout-1/slider/slider_1.jpeg' ) }}"
                                                 alt="{!! $slider->ds_label !!}">
                                        </div>
                                        <div class="carousel-caption p-2">
                                            <h5 class="m-0 p-0">{!! $slider->ds_label !!}</h5>
                                            <p class="m-0 pb-2">{!! $slider->ds_titulo !!}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--slider end--}}
            </div>


            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <span class="mb-0">
                            <i class="fa fa-ellipsis-v red" aria-hidden="true"></i>
                            <span class="manchete_chapeu">
                                {{ dataUppercase($noticias_temp[0]['ds_categoria']) }}
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                        </span>
                        <p class="mb-0 text-dark manchete_titulo text-justify">
                            <a href="#" class="text-link">
                                {{ $noticias_temp[0]['ds_titulo'] }}
                            </a>
                        </p>
                        <p class="text-dark manchete_corpo text-justify">
                            {{ $noticias_temp[0]['ds_texto_noticia'] }}
                        </p>
                    </div>

                    <div class="col-12 col-md-6">
                        <span class="mb-0">
                            <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                            <span class="noticia_chapeu1">
                                {{ dataUppercase($noticias_temp[1]['ds_categoria']) }}
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                        </span>
                        <p class="text-dark mb-1 noticia_titulo1 text-justify">
                            <a href="#" class="text-link">
                                {{ $noticias_temp[1]['ds_titulo'] }}
                            </a>
                        </p>
                        <p class="text-dark text-justify noticia_corpo1">
                            {{ $noticias_temp[1]['ds_texto_noticia'] }}
                        </p>
                    </div>

                    <div class="col-12 col-md-6">
                    <span class="mb-0">
                        <i class="fa fa-ellipsis-v blue" aria-hidden="true"></i>
                        <span class="noticia_chapeu1">
                            {{ dataUppercase($noticias_temp[2]['ds_categoria']) }}
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </span>
                    </span>
                        <p class="text-dark mb-1 noticia_titulo1 text-justify">
                            <a href="#" class="text-link">
                                {{ $noticias_temp[2]['ds_titulo'] }}
                            </a>
                        </p>
                        <p class="text-dark text-justify noticia_corpo1">
                            {{ $noticias_temp[2]['ds_texto_noticia'] }}
                        </p>
                    </div>
                </div>

                <div class="row d-lg-none">
                    <div class="col-12">
                        <a href="#">
                            <i class="fa fa-ellipsis-v orange" aria-hidden="true"></i>
                            Outras Noticias
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--destaque end--}}

        {{--owl-carousel--}}
        <section class="mt-3">
            <div class="owl-content">
                <div class="owl-carousel owl-theme pt-3">
                    <div class="item text-center">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="http://sinprosp.org.br/escola.asp" class="black faixa_size" target="_blank">Cursos e
                            <br>congressos</a>
                    </div>
                    <div class="item text-center">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="http://sinprosp.org.br/guia_consultas.asp#salario" class="black faixa_size"
                           target="_blank">Salários e<br/>reajustes</a>
                    </div>
                    <div class="item text-center">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="http://sinprosp.org.br/convencoes_acordos.asp" class="black faixa_size"
                           target="_blank">Convenções e<br/>acordos</a>
                    </div>
                    <div class="item text-center">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <a href="http://sinprosp.org.br/guia_consultas.asp" class="black faixa_size" target="_blank">Guia
                            de<br/>direitos</a>
                    </div>
                </div>
            </div>
        </section>
        {{--owl-carousel end--}}

        {{--noticias 2--}}
        <section class="mt-3">
            <div class="row">
                <div class="col-sm-6 col-md-3 mt-2">
                    <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                    <span class="manchete_chapeu">{{ dataUppercase($noticias_temp[3]['ds_categoria']) }}</span>
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <p class="text-dark mb-0 noticia_titulo2 text-justify">
                        <a href="#" class="text-link">
                            {{ $noticias_temp[3]['ds_titulo'] }}
                        </a>
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <i class="fa fa-ellipsis-v orange" aria-hidden="true"></i>
                    <span class="manchete_chapeu">{{ dataUppercase($noticias_temp[4]['ds_categoria']) }}</span>
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <p class="text-dark mb-0 noticia_titulo2 text-justify">
                        <a href="#" class="text-link">
                            {{ $noticias_temp[4]['ds_titulo'] }}
                        </a>
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <i class="fa fa-ellipsis-v lightblue" aria-hidden="true"></i>
                    <span class="manchete_chapeu">{{ dataUppercase($noticias_temp[5]['ds_categoria']) }}</span>
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <p class="text-dark mb-0 noticia_titulo2 text-justify">
                        <a href="#" class="text-link">
                            {{ $noticias_temp[5]['ds_titulo'] }}
                        </a>
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 mt-2">
                    <i class="fa fa-ellipsis-v purple" aria-hidden="true"></i>
                    <span class="manchete_chapeu">{{ dataUppercase($noticias_temp[6]['ds_categoria']) }}</span>
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                    <p class="text-dark mb-0 noticia_titulo2 text-justify">
                        <a href="#" class="text-link">
                            {{ $noticias_temp[6]['ds_titulo'] }}
                        </a>
                    </p>
                </div>
            </div>
        </section>
        {{--noticias 2 end--}}

        {{--servicos--}}
        <section class="mt-3">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="row">
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-balance-scale fa-3x text-dark"></i>',
                            'class' => 'servicos1',
                            'title' => 'ATENDIMENTO<br/>JURÍDICO'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-tasks fa-3x text-dark"></i>',
                            'class' => 'servicos1',
                            'title' => 'ATENDIMENTO<br/>PREVIDENCIÁRIO'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fab fa-creative-commons-sampling fa-3x text-dark"></i>',
                            'class' => 'servicos1',
                            'title' => 'FONOAUDIOLOGIA'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-umbrella-beach fa-3x text-dark"></i>',
                            'class' => 'servicos1',
                            'title' => 'COLÔNIA<br/>DE FÉRIAS'
                        ])
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @include('admin.components._icons_servicos', [
                             'route' => '#',
                             'icon' => '<i class="fas fa-notes-medical fa-3x text-dark"></i>',
                             'class' => 'servicos2',
                             'title' => 'PLANO DE SAÚDE'
                         ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-handshake fa-3x text-dark"></i>',
                            'class' => 'servicos2',
                            'title' => 'CONVÊNIOS<br/>E PARCERIAS'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-copy fa-3x text-dark"></i>',
                            'class' => 'servicos2',
                            'title' => 'HOMOLOGAÇÃO'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-folder-plus fa-3x text-dark"></i>',
                            'class' => 'servicos2',
                            'title' => 'ACERVO'
                        ])
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-comments fa-3x text-dark"></i>',
                            'class' => 'servicos3',
                            'title' => 'ATENDIMENTO<br/>ELETRÔNICO'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-envelope-open-text fa-3x text-dark"></i>',
                            'class' => 'servicos3',
                            'title' => 'BOLETIM<br/>DO SINPROSP'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fas fa-mobile-alt fa-3x text-dark"></i>',
                            'class' => 'servicos3',
                            'title' => 'APLICATIVO<br/>DO SINPROSP'
                        ])
                        @include('admin.components._icons_servicos', [
                            'route' => '#',
                            'icon' => '<i class="fab fa-whatsapp fa-3x text-dark"></i>',
                            'class' => 'servicos3',
                            'title' => 'WHATSAPP'
                        ])
                    </div>
                </div>
            </div>
        </section>
        {{--servicos end--}}

        {{--revista--}}
        <section class="mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mt-3">
                            <a href="http://www.sinprosp.org.br/sindicalizacao.asp" target="_blank">
                                <img class="rounded mx-auto d-block w-100"
                                     src="{{ asset('images/layout-1/home/sindicalizese.jpg') }}" alt="SinproSP">
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-3">
                            <a href="http://www.sinprosp.org.br/cadastro_login.asp" target="_blank">
                                <img class="rounded mx-auto d-block w-100"
                                     src="{{ asset('images/layout-1/home/cadevoce.jpg') }}" alt="SinproSP">
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-12 mt-3">
                            <div class="p-3 giz_background">
                                <div class="row">
                                    <div class="col-12 col-sm-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <a href="http://revistagiz.sinprosp.org.br" target="_blank"
                                                   class="text-link">
                                                    <img src="{{ asset('http://www.sinprosp.org.br/img/diversos/logo_revistagiz.png') }}"
                                                         alt="SinproSP">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-2">
                                                <a href="http://revistagiz.sinprosp.org.br/?p=7724" target="_blank"
                                                   class="text-link">
                                                    <img src="{{ asset('images/layout-1/home/img_giz.png') }}"
                                                         alt="SinproSP">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-7">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="http://revistagiz.sinprosp.org.br/?p=7724" target="_blank"
                                                   class="text-link">
                                                    <span class="text-dark font-weight-bold giz_titulo">
                                                    {{ $noticias_temp[7]['ds_titulo'] }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <a href="http://revistagiz.sinprosp.org.br/?p=7724" target="_blank"
                                                   class="text-link">
                                                    <p class="text-dark giz_corpo text-justify mb-0">
                                                        {{ $noticias_temp[7]['ds_texto_noticia'] }}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--revista end--}}

        {{--botao voltar--}}
        <div class="col">
            <hr>
            <a href="javascript:history.go(-1)" id="voltar" class="btn btn-danger" title="Voltar página anterior">Voltar</a>
        </div>
        {{--botao voltar end--}}
    </div>
@endsection()

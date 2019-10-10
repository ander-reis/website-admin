@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Notícias</h1>

{{--            @include('admin.components._preloader')--}}

            @can('noticias.create')
                <p>
                    <a href="{{ route('admin.noticias.create') }}" class="btn btn-outline-primary mr-2 mt-2 mb-2">
                        Cadastrar Notícia
                    </a>
                </p>
            @endcan

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th class="text-center">Data do Cadastro</th>
                    <th class="text-center">Status da Notícia</th>
                    <th class="text-center">Data Noticia</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Ver</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $noticia)
                    <tr>
                        <td>{{ $noticia->id }}</td>
                        <td>
                            @if($permission_view)
                                <a href="{{ route('admin.noticias.show', ['noticia' => $noticia->id]) }}">
                                    {{ $noticia->ds_resumo }}
                                </a>
                            @else
                                {{ $noticia->ds_resumo }}
                            @endif
                        </td>
                        <td class="text-center">{!! dtCadastroFormatted($noticia->dt_cadastro) !!}</td>
                        <td class="text-center">{!! flStatus($noticia->fl_status) !!}</td>
                        <td class="text-center">{!! dtCadastroFormatted($noticia->dt_cadastro) !!}</td>
                        <td class="text-center">
                            @if($permission_update)
                                <a class="text-dark link-icon"
                                   href="{{ route('admin.noticias.edit', ['noticia' => $noticia->id]) }}">
                                    <i class="fas fa-edit fa-2x"></i>
                                </a>
                            @else
                                <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(!$noticia->fl_status == 0)
                                <a class="text-success"
                                   href="{{ env('APP_URL_SITE_VER_NOTICIA') }}{{ $noticia->id }}"
                                   target="_blank">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </a>
                            @else
                                <a class="text-danger"
                                   href="{{ env('APP_URL_SITE_VER_OCULTA') }}{{ $noticia->id }}"
                                   target="_blank">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--paginacao--}}
            {!! $model->links() !!}

        </div>
    </div>
@endsection()

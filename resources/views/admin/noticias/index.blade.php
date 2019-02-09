@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Notícias</h1>
            <p>
                @can('noticias.create')
                    <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar
                        Notícia</a>
                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-info ml-2 mt-2 mb-2">Categorias</a>
                @endcan
                @cannot('noticias.create')
                    <button class="btn btn-primary mr-2 mt-2 mb-2" disabled>Cadastrar</button>
                    <button class="btn btn-primary mr-2 mt-2 mb-2" disabled>Categorias</button>
                @endcannot
            </p>
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
                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->id_noticia }}</td>
                        <td>
                            @can('noticias.view')
                                <a class="text-dark"
                                   href="{{ route('admin.noticias.show', ['noticia' => $noticia->id_noticia]) }}">
                                    {{ $noticia->ds_resumo }}
                                </a>
                            @endcan
                            @cannot('noticias.view')
                                {{ $noticia->ds_resumo }}
                            @endcannot
                        </td>
                        <td class="text-center">{{ $noticia->created_at_formatted }}</td>
                        <td class="text-center">{!! $noticia->fl_oculta_formatted !!}</td>
                        <td class="text-center">{{ $noticia->dt_cadastro_formatted }}</td>
                        <td class="text-center">
                            @can('noticias.update')
                                <a class="text-dark"
                                   href="{{ route('admin.noticias.edit', ['noticia' => $noticia->id_noticia]) }}">
                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                </a>
                            @endcan
                            @cannot('noticias.update')
                                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                            @endcannot
                        </td>
                        <td class="text-center">
                            @if(!$noticia->fl_oculta == 0)
                                <a class="text-success"
                                   href="{{ env('APP_URL_SITE_VER_NOTICIA') }}{{ $noticia->id_noticia }}"
                                   target="_blank">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </a>
                            @else
                                <span class="text-muted">
                                    <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--paginacao--}}
            {!! $noticias->links() !!}

        </div>
    </div>
@endsection()

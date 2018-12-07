@extends('layouts.admin')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1>Notícias</h1>
                <p>
                    <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Notícia</a>
                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-info ml-2 mt-2 mb-2">Categorias</a>
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
                            <td>{{ $noticia->id }}</td>
                            <td>{{ $noticia->ds_resumo }}</td>
                            <td class="text-center">{{ $noticia->created_at_formatted }}</td>
                            <td class="text-center">{!! $noticia->fl_oculta_formatted !!}</td>
                            <td class="text-center">{{ $noticia->dt_noticia_formatted }}</td>
                            <td class="text-center">
                                <a class="text-dark" href="{{ route('admin.noticias.edit', ['noticia' => $noticia->id]) }}">
                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                {{--<a class="text-info" href="{{ route('ver-noticia', ['noticia-id' => $noticia->id]) }}" target="_blank">--}}
                                    {{--<i class="fa fa-eye fa-2x" aria-hidden="true"></i>--}}
                                {{--</a>--}}
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
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>Conteúdo Páginas Principais</h1>
            </div>
            <p>
                <a href="{{ route('admin.paginas.create') }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Página</a>
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Url da Página</th>
                    <th scope="col" class="text-center">Status da Página</th>
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paginas as $pagina)
                    <tr>
                        <td>{{ $pagina->id_pagina }}</td>
                        <td>{{ $pagina->txt_titulo }}</td>
                        <td>/{{ $pagina->url_pagina }}</td>
                        <td class="text-center">
                            {!! $pagina->fl_status_formatted !!}
                        </td>
                        <td class="text-center">
                            <a class="text-dark" href="{{ route('admin.paginas.edit', ['pagina' => $pagina]) }}">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="text-danger" href="#" data-toggle="modal" data-target="#deletePaginaModal" data-whatever="{{ $pagina->id }}">
                                <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--paginacao--}}
            {!! $paginas->links() !!}
        </div>
    </div>

    @component('admin.paginas-principais._modal_delete')
    @endcomponent
@endsection()

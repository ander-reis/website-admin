@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>{{ $convencao->ds_titulo }}</h1>
            </div>
            <p>
                <a href="{{ route('admin.convencao.clausulas.create', ['convencao' => $convencao]) }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Cláusula</a>
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Cláusula</th>
                    <th scope="col" class="text-center">Número</th>
                    <th>Status</th>
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clausulas as $clausula)
                    <tr>
                        <td>{{ $clausula->ds_titulo }}</td>
                        <td class="text-center">{{ $clausula->num_clausula }}</td>
                        <td>
                            {!! $clausula->fl_ativo_formatted !!}
                        </td>
                        <td class="text-center">
                            <a class="text-dark" href="{{ route('admin.convencao.clausulas.edit', ['clausula' => $clausula->id, 'convencao' => $clausula->id_convencao]) }}">
                                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteClausulaModal" data-whatever="{{ $clausula->id }}">
                                <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--paginacao--}}
            {!! $clausulas->links() !!}
        </div>
    </div>

    @component('admin.clausulas._modal_delete', ['convencao_id' => $convencao->id])
    @endcomponent

@endsection()
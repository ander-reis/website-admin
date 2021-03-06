@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>{{ $convencoes->ds_titulo }}</h1>
            </div>
            <p>
                @can('clausulas.create')
                    <a href="{{ route('admin.convencao.clausulas.create',
                    ['convencoes_entidade' => $convencoes->fl_entidade, $convencoes]) }}"
                       class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Cláusula</a>
                @endcan
            </p>

            @component('admin.components._data_exists', ['collection' => $clausulas->isEmpty()])@endcomponent

            @if(!$clausulas->isEmpty())
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
                            {!! flStatus($clausula->fl_status) !!}
                        </td>
                        <td class="text-center">
                            @if($permission_update)
                                <a class="text-dark link-icon" href="{{ route('admin.convencao.clausulas.edit', [
                                'convencoes_entidade' => $convencoes->fl_entidade,
                                $convencoes,
                                $clausula,
                                ]) }}">
                                    <i class="fas fa-edit fa-2x"></i>
                                </a>
                            @else
                                <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($permission_destroy)
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteClausulaModal" data-whatever="{{ $clausula->id_clausula }}">
                                    <i class="fas fa-trash-alt fa-2x"></i>
                                </a>
                            @else
                                <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            {{--paginacao--}}
            {!! $clausulas->links() !!}
        </div>
    </div>

    @component('admin.components._confirm_delete_component')
        @slot('idModal')
            deleteClausulaModal
        @endslot
        @slot('openForm')
            {{ Form::open(['route' => ['admin.convencao.clausulas.destroy', $convencoes->fl_entidade, $convencoes->id_convencao], 'method' => 'DELETE']) }}
            {{ Form::hidden('id_clausula', null, ['class' => 'form-control', 'id' => 'id-clausula']) }}
        @endslot
        @slot('title')
            Excluir Cláusula confirm?
        @endslot
    @endcomponent

@endsection()

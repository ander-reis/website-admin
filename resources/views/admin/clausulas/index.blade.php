@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>{{ $convencoes->ds_titulo }}</h1>
            </div>
            <p>
                @can('convencoes.create')
                    <a href="{{ route('admin.convencao.clausulas.create',
                    ['convencoes_entidade' => $convencoes->fl_entidade, $convencoes]) }}"
                       class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Cláusula</a>
                @endcan
                @cannot('convencoes.create')
                    <button class="btn btn-primary mr-2 mt-2 mb-2" disabled>Cadastrar Claúsula</button>
                @endcannot
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
                            {!! $clausula->fl_ativo_formatted !!}
                        </td>
                        <td class="text-center">
                            @can('convencoes.update')
                                <a class="text-dark" href="{{ route('admin.convencao.clausulas.edit', [
                                'convencoes_entidade' => $convencoes->fl_entidade,
                                'convencoes' => $clausula->id_convencao,
                                '$clausula' => $clausula,
                                ]) }}">
                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                </a>
                            @endcan
                            @cannot('convencoes.update')
                                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                            @endcannot
                        </td>
                        <td class="text-center">
                            @can('convencoes.delete')
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteClausulaModal" data-whatever="{{ $clausula->id_clausula }}">
                                    <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                                </a>
                            @endcan
                            @cannot('convencoes.delete')
                                <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                            @endcannot
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

    @component('admin.clausulas._modal_delete', ['convencoes_entidade' => $convencoes->fl_entidade, 'convencao_id' => $convencoes->id_convencao])
    @endcomponent

@endsection()

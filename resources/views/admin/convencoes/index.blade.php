@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>{{ $entidade->ds_entidade }}</h1>
            </div>
            @can('convencoes.create')
                <p>
                    <a href="{{ route('admin.convencao.create', ['entidade_id' => $entidade->id]) }}"
                       class="btn btn-outline-primary mr-2 mt-2 mb-2">Cadastrar Convenção</a>
                </p>
            @endcan
            @component('admin.components._data_exists', ['collection' => $convencoes->isEmpty()])@endcomponent

            @if(!$convencoes->isEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col" class="text-center">Ano de Validade</th>
                        <th>Ativo</th>
                        <th scope="col" class="text-center">Cláusulas</th>
                        <th scope="col" class="text-center">Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($convencoes as $convencao)
                        <tr>
                            <td>
                                @can('convencoes.view')
                                    <a href="{{ route('admin.convencao.show', [$entidade, $convencao]) }}">
                                        {{ $convencao->ds_titulo }}
                                    </a>
                                @endcan
                                @cannot('convencoes.view')
                                    {{ $convencao->ds_titulo }}
                                @endcannot
                            </td>
                            <td class="text-center">{{ $convencao->dt_validade }}</td>
                            <td>
                                {!! flStatus($convencao->fl_status) !!}
                            </td>
                            <td class="text-center">
                                @can('convencoes.view')
                                    <a class="text-primary"
                                       href="{{ route('admin.convencao.clausulas.index', [$entidade, $convencao]) }}">
                                        <i class="fa fa-asterisk fa-2x" aria-hidden="true"></i>
                                    </a>
                                @endcan
                                @cannot('convencoes.view')
                                        <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                                @endcannot
                            </td>
                            <td class="text-center">
                                @can('convencoes.update')
                                    <a class="text-dark link-icon"
                                       href="{{ route('admin.convencao.edit', [$entidade, $convencao]) }}">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </a>
                                @endcan
                                @cannot('convencoes.update')
                                    <i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i>
                                @endcannot
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{--paginacao--}}
    {!! $convencoes->links() !!}
@endsection()

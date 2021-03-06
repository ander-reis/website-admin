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
                                @if($permission_view)
                                    <a href="{{ route('admin.convencao.show', [$entidade, $convencao]) }}">
                                        {{ $convencao->ds_titulo }}
                                    </a>
                                @else
                                    {{ $convencao->ds_titulo }}
                                @endif
                            </td>
                            <td class="text-center">{{ $convencao->dt_validade }}</td>
                            <td>
                                {!! flStatus($convencao->fl_status) !!}
                            </td>
                            <td class="text-center">
                                @if($permission_view)
                                    <a class="text-primary"
                                       href="{{ route('admin.convencao.clausulas.index', [$entidade, $convencao]) }}">
                                        <i class="fa fa-asterisk fa-2x" aria-hidden="true"></i>
                                    </a>
                                @else
                                        <i class="fa fa-exclamation-circle fa-2x text-danger" aria-hidden="true"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($permission_update)
                                    <a class="text-dark link-icon"
                                       href="{{ route('admin.convencao.edit', [$entidade, $convencao]) }}">
                                        <i class="fas fa-edit fa-2x"></i>
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
        </div>
    </div>
    {{--paginacao--}}
    {!! $convencoes->links() !!}
@endsection()

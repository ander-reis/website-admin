@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <h1>{{ $entidade->ds_entidade }}</h1>
            </div>
            <p>
                @can('convencoes.create')
                    <a href="{{ route('admin.convencao.create', ['entidade_id' => $entidade->id]) }}" class="btn btn-primary mr-2 mt-2 mb-2">Cadastrar Convenção</a>
                @endcan
                @cannot('convencoes.create')
                    <button class="btn btn-primary mr-2 mt-2 mb-2" disabled>Cadastrar Convenção</button>
                @endcannot
            </p>
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
                            @can('noticias.view')
                                <a href="{{ route('admin.convencao.show', ['id' => $entidade->id, 'id_convencao' => $convencao->id_convencao]) }}">
                                    {{ $convencao->ds_titulo }}
                                </a>
                            @endcan
                            @cannot('noticias.view')
                                {{ $convencao->ds_titulo }}
                            @endcannot
                        </td>
                        <td class="text-center">{{ $convencao->dt_validade }}</td>
                        <td>
                            {!! $convencao->fl_ativo_formatted !!}
                        </td>
                        <td class="text-center">
                            <a class="text-primary" href="{{ route('admin.convencao.clausulas.index', ['convencao' => $convencao->id_convencao]) }}">
                                <i class="fa fa-asterisk fa-2x" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            @can('convencoes.update')
                                <a class="text-dark" href="{{ route('admin.convencao.edit', ['convencao' => $convencao->id_convencao]) }}">
                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
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
        </div>
    </div>

    {{--paginacao--}}
    {!! $convencoes->links() !!}
@endsection()

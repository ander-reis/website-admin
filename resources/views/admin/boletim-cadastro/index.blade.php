@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Boletim</h1>
            @can('boletim-cadastro.create')
                <p>
                    <a href="{{ route('admin.boletim-cadastro.create') }}" class="btn btn-outline-primary mr-2 mt-2 mb-2">
                        Cadastrar Boletim
                    </a>
                </p>
            @endcan
            <table class="table">
                <thead>
                <tr>
                    <th>ID Boletim</th>
                    <th>Destaque</th>
                    <th class="text-center">Data do Boletim</th>
                    <th class="text-center">Link</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $item)
                    <tr>
                        <td>{{ $item->id_boletim }}</td>
                        <td>{{ $item->ds_destaque }}</td>
                        <td class="text-center">{!! dtCadastroFormatted($item->dt_boletim) !!}</td>
                        <td>{{ $item->ds_link }}</td>
                        <td class="text-center">
                            @if(!isset($not_update))
                                <a class="text-dark link-icon"
                                   href="{{ route('admin.boletim-cadastro.edit', ['id' => $item->id]) }}">
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
            {{--paginacao--}}
            {!! $model->links() !!}
        </div>
    </div>
@endsection()

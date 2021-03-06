@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Categorias</h1>
            @can('noticias-categoria.create')
                <p>
                    <a href="{{ route('admin.noticias-categoria.create') }}"
                       class="btn btn-outline-primary mr-2 mt-2 mb-2">
                        Cadastrar Categoria
                    </a>
                </p>
            @endcan
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th class="text-center">Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($model as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->ds_categoria }}</td>
                        <td class="text-center">
                            @if($permission)
                            <a class="text-dark link-icon"
                               href="{{ route('admin.noticias-categoria.edit', ['noticia' => $categoria->id]) }}">
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

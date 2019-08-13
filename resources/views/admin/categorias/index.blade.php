@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Categorias</h1>
            <p>
                <a href="{{ route('admin.categorias.create') }}" class="btn btn-outline-primary mr-2 mt-2 mb-2">Cadastrar
                    Categoria</a>
            </p>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th class="text-center">Editar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($noticiasCategorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id_categoria }}</td>
                        <td>{{ $categoria->ds_categoria }}</td>
                        <td class="text-center">
                            <a class="text-dark link-icon"
                               href="{{ route('admin.categorias.edit', ['noticia' => $categoria->id_categoria]) }}"><i
                                        class="fa fa-pencil-square-o fa-2x" aria-hidden="true">&nbsp;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{--paginacao--}}
            {!! $noticiasCategorias->links() !!}

        </div>
    </div>
@endsection()

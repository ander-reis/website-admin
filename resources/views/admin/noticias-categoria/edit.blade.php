@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Categoria</h1>
        </div>

        {{ Form::model($categorias, ['route' => ['admin.noticias-categoria.update', $categorias->id], 'method' => 'PUT']) }}

        @include('admin.noticias-categoria._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.noticias-categoria.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()

@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Categoria</h1>
        </div>

        {{ Form::open(['route' => 'admin.noticias-categoria.store']) }}

        @include('admin.noticias-categoria._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.noticias-categoria.index') }}" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()

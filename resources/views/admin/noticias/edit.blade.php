@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Notícia</h1>
        </div>

        {{ Form::model($noticias, ['route' => ['admin.noticias.update', $noticias->id], 'method' => 'PUT']) }}

        @include('admin.noticias._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="javascript:history.go(-1)" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()

@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Notícia</h1>
        </div>

        {{ Form::model($model, ['route' => ['admin.boletim-cadastro.update', $model->id], 'method' => 'PUT']) }}

        @include('admin.boletim-cadastro._form')

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="#" onclick="history.back()" class="button btn btn-danger">Voltar</a>

        {{ Form::close() }}
    </div>
@endsection()

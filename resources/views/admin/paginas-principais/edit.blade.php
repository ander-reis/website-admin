@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        {{ Form::model($model, ['route' => ['admin.paginas-principais.update', $model->id_pagina], 'method' => 'PUT']) }}
        @include('admin.paginas-principais._form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('admin.paginas-principais.index') }}" class="button btn btn-danger">Voltar</a>
        {{ Form::close() }}
    </div>
@endsection()

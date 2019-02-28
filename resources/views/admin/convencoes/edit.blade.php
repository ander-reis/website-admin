@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Convenção</h1>
        </div>

        {{ Form::model($model, ['route' => ['admin.convencao.update', $model], 'files' => true, 'method' => 'PUT']) }}

        @include('admin.convencoes._form')

        <button type="submit" class="btn btn-primary">Editar</button>

        {{ Form::close() }}
    </div>
@endsection()

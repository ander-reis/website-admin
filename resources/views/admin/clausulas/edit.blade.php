@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="my-3">
        <h1>Editar Cláusula</h1>
    </div>

    @component('admin.components._alert_error')
        {{Session::get('error-message')}}
    @endcomponent

    {{ Form::model($clausulas, ['route' => ['admin.convencao.clausulas.update', $convencao, $clausulas], 'method' => 'PUT']) }}

    @include('admin.clausulas._form')

    <button type="submit" class="btn btn-primary">Editar</button>

    {{ Form::close() }}
</div>
@endsection()
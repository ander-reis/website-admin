@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Cláusula</h1>
            <p>Convenção Coletiva: <b>{{ $convencao->ds_titulo }}</b></p>
        </div>

        @component('admin.components._alert_error')
            {{Session::get('error-message')}}
        @endcomponent

        {{ Form::model(null, ['route' => ['admin.convencao.clausulas.store', $convencao->id_convencao]]) }}

        @include('admin.clausulas._form')

        <button type="submit" class="btn btn-primary">Cadastrar</button>

        {{ Form::close() }}

    </div>
@endsection()

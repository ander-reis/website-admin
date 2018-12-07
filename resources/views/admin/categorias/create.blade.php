@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Cadastrar Categoria</h1>
        </div>

        @component('admin.components._alert_error')
            {{Session::get('error-message')}}
        @endcomponent

        {{ Form::open(['route' => 'admin.categorias.store']) }}

        @include('admin.categorias._form')

        <button type="submit" class="btn btn-primary">Cadastrar</button>

        {{ Form::close() }}
    </div>
@endsection()
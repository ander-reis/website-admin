@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Página</h1>
        </div>

        @component('admin.components._alert_error')
            {{Session::get('error-message')}}
        @endcomponent

        {{ Form::model($pagina, ['route' => ['admin.paginas.update', $pagina], 'method' => 'PUT']) }}

        @include('admin.paginas-principais._form')

        <button type="submit" class="btn btn-primary">Editar</button>

        {{ Form::close() }}
    </div>
@endsection()

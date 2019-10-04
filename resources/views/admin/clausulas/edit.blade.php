@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    <div class="my-3">
        <h1>Editar Cláusula</h1>
    </div>

    {{ Form::model($clausula, ['route' => ['admin.convencao.clausulas.update', 'convencoes_entidade' => $convencoes->fl_entidade, $convencoes, $clausula], 'method' => 'PUT']) }}

    @include('admin.clausulas._form')

    <button type="submit" class="btn btn-primary">Salvar</button>

     <a href="{{ route('admin.convencao.clausulas.index', ['convencoes_entidade' => $convencoes->fl_entidade, 'convencoes' => $convencoes->id_convencao]) }}" class="button btn btn-danger">Voltar</a>

    {{ Form::close() }}
</div>
@endsection()

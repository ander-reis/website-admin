@extends('layouts.admin')

@section('content')

{{--    {{ Form::open(['route' => 'admin.home-page.store', 'id' => 'homePageForm']) }}--}}
{{--    @include('admin.home-page._form')--}}
{{--    <button type="submit" class="btn btn-primary">Cadastrar</button>--}}
{{--    {{ Form::close() }}--}}

    {{ Form::open(['route' => 'admin.home-page.store']) }}
    @include('admin.home-page.tab')
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    {{ Form::close() }}


@endsection()

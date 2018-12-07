@extends('layouts.admin')

@section('content')
    <div class="col-md-12">
        <div class="my-3">
            <h1>Editar Link</h1>
        </div>

        @component('admin.components._alert_error')
            {{Session::get('error-message')}}
        @endcomponent

        {{ Form::model($owlCarousel, ['route' => ['admin.owl-carousel.update', $owlCarousel->id], 'method' => 'PUT' ]) }}

        @include('admin.owl-carousel._form')

        <button type="submit" class="btn btn-primary">Editar</button>

        {{ Form::close() }}
    </div>
@endsection()
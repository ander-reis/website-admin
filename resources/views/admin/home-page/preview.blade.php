@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Preview</h1>
        <div>
            <a href="{{ Redirect::back() }}" class="btn btn-outline-danger">voltar</a>
        </div>

        <div>
            @foreach($noticias as $key => $item)
                <p>{{ $item['ds_categoria'] }}</p>
                <p>{{ $item['ds_titulo'] }}</p>
            @endforeach
        </div>

    </div>
@endsection()

@extends('layouts.app')

@section('content')
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5">
        @foreach ($actors as $actor)
            <div class="col d-flex flex-column list-movie-title justify-content-between">
                <a href="/actor/{{ $actor->id}}"></a>
                <img class="list-movie-image img-fluid w-100" src="{{ $actor->pic}}" alt="{{ $actor->name}}"/>
            </div>
        @endforeach
    </div>
@endsection
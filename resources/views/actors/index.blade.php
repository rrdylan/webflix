@extends('layouts.app')

@section('content')
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5">
        {{ dump($actors[0])}}
        @foreach ($actors as $actor)
            <div class="col d-flex flex-column list-movie-title justify-content-between">
                <img class="list-movie-image img-fluid w-100" src="{{ $actor->pic}}" alt="{{ $actor->name}}"/>
            </div>
        @endforeach
    </div>
@endsection
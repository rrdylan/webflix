@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <img src="{{ $movie->cover}}" width="200" alt="{{ $movie->title}}"/>
            
        </div>
        <div class="col">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->synopsis }}</p>
            <p>Durée: {{ $movie->duration }}</p>
            @if($movie->released_at)
            <p>Sortie: {{ $movie->released_at }}</p>
            @endif
            <p>Catégorie: {{ $movie->category_id }}</p>
            
        </div>
    </div>
@endsection

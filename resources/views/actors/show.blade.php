@extends('layouts.app')

@section('content')
<div class="row lg-12">
    <h1>{{ $actor->name }}</h1>
    
    <div class="col-3 ">
        <div class="col-11 card">
            <img src="{{ $actor->profil}}" class="w-200" alt="{{ $actor->name}}"/>
            <p>Nom : {{ $actor->name }}</p>
            <p>Né le : {{ $actor->birthday }}</p>
        </div>
    </div>

    <div class="col-9 card">
        <h3>Biography</h3>
        <text>
            <p> {{ $actor->biography }} </p>
        </text>
    </div>
    
    
</div>
<div class="row">
    <h3>Filmography</h3>
    <div class="col-3"> 
        @foreach ($movies as $movie)
        <a href="/film/{{ $movie->id }}">
            <img src="{{ $movie->cover}}" class="img-fluid" alt="{{ $movie->name }}"/>
        </a>
        @endforeach
    </div>
</div>
@endsection
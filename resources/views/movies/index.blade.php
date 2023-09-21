@extends('layouts.app')

@section('content')

@if(Auth::user())
    <div class="text-center mb-4">
        <a href="/films/creer" class="btn btn-primary">Créer un film</a>
    </div>
@endif


    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
        @foreach ($movies as $movie)
            <div class="list-movie col d-flex flex-column justify-content-between my-2 card p-0">
                <a href="/film/{{ $movie->id }}">
                    <div class="list-movie-data flex-grow-1 justify-content-between">
                        
                        <img class="list-movie-image img-fluid w-100" src="{{ $movie->cover}}" ="{{ $movie->title}}"/>
                        
                        <div class="movie-title">
                            <h3>
                                {{ $movie->title }}
                            </h3>
                        </div>
                        
                        <p class="list-movie-synopsis px-2">
                            {{ Str::words($movie->synopsis, 10) }}
                        </p>
                        
                        <p class="list-movie-meta">
                            {{ $movie->duration }} | 
                            
                            @if($movie->released_at)
                            {{ $movie->released_at->translatedFormat('d F Y') }} | 
                            @endif
                            
                            {{ $movie->category->name}}
                        </p>
                    </div>
                </a>
                
                <div class="text-center">
                    <form class="d-inline" action="/panier/{{ $movie->id }}" method="post">
                        @csrf
                        <button class="btn btn-lg">
                            🛒
                        </button>
                    </form>
                    @if(Auth::user() && $movie->user_id === Auth::user()->id)
                        <a href="/film/{{$movie->id}}/modifier" class="btn btn-lg"> 🖋 </a>
                        <form action="/film/{{ $movie->id}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-lg"> 🗑 </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="row"> 
        {{ $movies->links()}}
    <div>
@endsection

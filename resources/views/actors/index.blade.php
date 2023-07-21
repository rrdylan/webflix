@extends('layouts.app')

@section('content')
    @if(Auth::user())
        <div class="text-center mb-4">
            <a href="/actors/creer" class="btn btn-primary">Ajouter un acteur</a>
        </div>
    @endif
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5">
        @foreach ($actors as $actor)
            <div class="col d-flex flex-column list-movie-title justify-content-between card mb-5 p-0">
                <a href="/actor/{{ $actor->id}}">
                    <img class="list-movie-image img-fluid w-100" src="{{ $actor->profil}}" alt="{{ $actor->name}}"/>
                    <div class="list-movie-meta"> 
                        <h3>
                            {{ $actor->name }}
                        </h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $actors->links() }}
    </div>
@endsection
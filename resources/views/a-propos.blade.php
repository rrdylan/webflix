@extends('layouts.app')

@section('content')
    <h1> {{ $name }}</h1>
    @if ( $user )
        <h3> Profil : {{ $user }}</h3>
    @endif
    <ul> Notre équipe
        @foreach ($team as $dev)
            <li> {{ $dev }}</li>        
        @endforeach
    </ul>
@endsection
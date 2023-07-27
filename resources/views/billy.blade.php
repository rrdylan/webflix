@extends('layouts.app')

@section('content')
    <h1>Salut Billy</h1>
    <p>Tu as {{ $age }} </p>

    @if ( $age >= 18)
        <p>Tu es majeur.</p>
    @endif

    
    @if ( $friend)
    <p> {{ $name }} joue avec  {{ $friend }} </p>
    @endif
@endsection
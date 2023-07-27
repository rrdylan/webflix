@extends('layouts.app')

@section('content')
    @forelse($cart as $item)
        {{ $item }}
        @empty
        <h1 class="text-center"> Votre panier est vide </h1>
    @endforelse
@endsection
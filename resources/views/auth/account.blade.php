@extends('../layouts.app')

@section('content')
    <h1> Bonjour {{ Auth::user()->name }} </h1>
    <p>test</p>
@endsection
@extends('layouts/app')

@section('name')
    <h1> Notre site : {{ $title }} </h1>

    <ul>
        @foreach ($numbers as $number)
            <li> {{ $number }} </li>
        @endforeach
    </ul>
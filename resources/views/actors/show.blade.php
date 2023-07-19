@extends('layout.app')

@section('content')
<div class="row">
    <div class="col">
        <img src="{{ $actor->pic}}" width="200" alt="{{ $actor->name}}"/>
    </div>
</div>
@endsection
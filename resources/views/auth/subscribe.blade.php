@extends('layouts.app')

@section('content')
    <div class="content">

        <form action="" method="post" enctype="multipart/form-data">

            <div>
                <label for="name">Identifiant</label>
                <input type="text" name="name" id="name" placeholder="Identifiant">
                @error('name')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <div>
                <label for="email">Adresse email</label>
                <input type="text" name="email" id="email" placeholder="Adresse emil">
                @error('email')
                    <div> {{ $message }} </div>
                @enderror
            </div>

            <button> Valider </button>
        </form>

    </div>
@endsection
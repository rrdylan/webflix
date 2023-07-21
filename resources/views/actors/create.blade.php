@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <form action="" method="post" class="col-6" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }} ">
            @error('title')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div>
            <label for="biography">Biography</label>
            <input type="text" name="biography" id="biography" value="{{ old('biography') }} ">
            @error('biography')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div>
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }} ">
            @error('biography')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="deathday">Décès</label>
            <input type="date" name="deathday" id="deathday" value="{{ old('deathday') }} ">
            @error('deathday')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div>
            <label for="origin">Origines</label>
            <input type="text" name="origin" id="origin" value="{{ old('origin') }} ">
            @error('origin')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div>
            <label for="profil">Photo</label>
            <input type="file" name="profil" id="profil" value="{{ old('profil') }} ">
            @error('profil')
            <div>
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <button>Ajouter</button>

    </form>
</div>
    @endsection
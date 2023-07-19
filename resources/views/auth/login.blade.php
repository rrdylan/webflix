@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header">
                Connexion
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <ul class="alert alert-danger px-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="form-in-email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="form-in-email" name="email" placeholder="email@example.com" value="jean.claude@mandale.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control mt-2" >

                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">
                                Se souvenir des identifiants
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            Connexion
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection

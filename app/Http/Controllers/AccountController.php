<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        return view('auth.account');
    }

    // envoi à la page d'inscription
    public function create(){
        return view('auth.subscribe');
    }

    public function store(){}

    public function edit(){}

    public function update(){}

    public function delete(){}
}

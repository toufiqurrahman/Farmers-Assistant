<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('Profile/profile');
    }

    public function create(){

    }

    public function edit(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('Profile/edit', ['user' => $user]);
    }
}

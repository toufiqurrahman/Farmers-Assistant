<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInterest;
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
        $user = Auth::user();
        $interests = [];
        foreach ($user->interests as $interest)
            array_push($interests, $interest->interest);
        return view('Profile/edit', ['user' => $user, 'user_interests' => $interests]);
    }
}

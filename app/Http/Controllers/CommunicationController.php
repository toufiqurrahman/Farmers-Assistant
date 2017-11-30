<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'expert' || Auth::user()->role == 'farmer') {
            return view('gruveo');
        }
        else
            return view('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Expert;
use Illuminate\Support\Facades\Auth;

class AddExpertController extends Controller
{

    public function index(){
        if(Auth::user()->role == 'admin')
            return view('/admin/add_expert');
        else
            return view('home');
    }

    public function showDeleteExpertForm(){
        $experts = User::where('role','expert')->get();
        if(Auth::user()->role == 'admin')
            return view('manage_users', ['users' => $experts]);
        else
            return view('home');
    }



    public function storeUser(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|digits:11|regex:/(01)[5-9]{1}[0-9]{8}/',
            'role' => 'required|string',
        ]);

        $user = new Expert;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;

        $user->save();

        return redirect('/home/add_expert');

    }

}

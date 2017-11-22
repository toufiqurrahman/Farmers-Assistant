<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expert;

class AddExpertController extends Controller
{

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

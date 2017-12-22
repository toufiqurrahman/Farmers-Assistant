<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function showPasswordChangeForm()
    {
        return view('/auth/passwords/change_password');
    }

    public function changePassword(Request $request){

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $user = Auth::user();

        if(!Hash::check($request->current_password,$user->password)){
            flash("Current password doesn't match");
            return redirect('/home/change-password');
        }

        else
            $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/home/profile');

    }


}



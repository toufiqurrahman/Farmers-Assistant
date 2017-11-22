<?php

namespace App\Http\Controllers;

use App\UserInterest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function storeBasicInformation(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|digits:11|regex:/(01)[5-9]{1}[0-9]{8}/',

        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        $user->interests()->detach(Auth::user()->interests);
        $user->interests()->attach($request->interests);

        return redirect('/home/profile');

    }
}

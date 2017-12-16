<?php

namespace App\Http\Controllers;

use App\UserInterest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UpdateProfileController extends Controller
{
    public function index(){
        return view('Profile/edit');
    }

    public function storeBasicInformation(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|digits:11|regex:/(01)[5-9]{1}[0-9]{8}/',
//           'interests'=>'unique:interests',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($user->role == 'farmer' || $user->role == 'trader') {
            $user->interests()->detach(Auth::user()->interests);
            $user->interests()->attach($request->interests);
        }

        $user->save();

        return redirect('/home/profile');
    }
}

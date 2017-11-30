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
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|digits:11|regex:/(01)[5-9]{1}[0-9]{8}/',
//           'interests'=>'unique:interests',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($user->email==$request->email){
            $user->save();
        }
        else {
            $flag = 0;
            $users = User::all();
            foreach ($users as $item) {
                if ($item->email == $request->email) {
                    $flag=1;
                }
            }
            if ($flag==0){
                $user->email = $request->email;
                $user->save();
            }

        }

        $user->interests()->detach(Auth::user()->interests);
        $user->interests()->attach($request->interests);

        return redirect('/home/profile');
    }
}

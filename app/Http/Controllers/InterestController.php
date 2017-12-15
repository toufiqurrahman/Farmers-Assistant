<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function showAddInterestForm(){
        if(Auth::user()->role == 'admin') {
            return view('/admin/add_interests');
        }
        else
            return view('home');

    }

    public function showDeleteInterestForm(){
        if(Auth::user()->role == 'admin') {
            return view('/admin/delete_interests');
        }
        else
            return view('home');
    }

    public function AddInterest(Request $request){
            $this->validate($request, [
                'interest' => 'required|string|unique:interest',
            ]);

            $user = new Interest;
            $user->interest = $request->interest;

            $user->save();

            return redirect('/home/add_interest');
    }

    public function DeleteInterest(Request $request){
            $this->validate($request, [

            ]);

            $item = new Interest();
            $item->interest = $request->interest;
            $id = Interest::find($request->interest);
            if($id != null)
                $id->delete();

            return redirect('/home/delete_interest');
    }
}

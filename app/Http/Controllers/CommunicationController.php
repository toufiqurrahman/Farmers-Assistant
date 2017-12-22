<?php

namespace App\Http\Controllers;

use App\CallerId;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunicationController extends Controller
{

    public function index(){
        if(Auth::user()->role == 'expert' || Auth::user()->role == 'farmer') {
            $now = Carbon::now()->subMinutes(30);
            $caller_id = CallerId::where('last_active', '>=', $now)->get();
            return view('gruveo', ['experts' => $caller_id]);
        }
        else
            return view('home');
    }

    public function getGruveoToken(Request $request, $expert_id = null) {
        $user = Auth::user();
        if($user->role == 'expert') {
            $caller_id = CallerId::where('user_id', $user->id)->first();
            return $caller_id->gruveo_key;
        }
        else if($user->role == 'farmer'){
            $expert_id = $request->expert_id;
            $caller_id = CallerId::where('user_id', $expert_id)->first();
            if ($caller_id == null) {
                $caller_id = new CallerId();
                $caller_id->user_id = $expert_id;
            }
            $caller_id->gruveo_key = bin2hex(random_bytes(10));
            $caller_id->save();
            return $caller_id->gruveo_key;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionSectionController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'expert'|| Auth::user()->role == 'farmer') {
            return view('discussion');
        }
        else
            return view('home');
    }

    public function store(Request $request){
        $this->validate($request, [
            'question' => 'required|string',
        ]);

        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;

        $question->save();

        return redirect('/home');

    }

    public function showQuestion(){

        if (Auth::user()->role == 'farmer' || Auth::user()->role == 'expert'){
            $questions = Question::all();
            return view('discussion',['questions' => $questions]);
        }

        else
            return view('home');
    }

}

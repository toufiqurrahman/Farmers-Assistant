<?php

namespace App\Http\Controllers;

use App\Question;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class DiscussionSectionController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'expert'|| Auth::user()->role == 'farmer') {
            return view('discussion');
        }
        else
            return view('home');
    }

    public function storeQuestion(Request $request){
        $this->validate($request, [
            'question' => 'required|string',
        ]);

        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;

        $question->save();

        return redirect(route('showQuestion'));

    }

    public function storeReply(Request $request, $question_id){
        $this->validate($request, [
            'reply' => 'required|string',
        ]);

        $reply = new Reply();
        $reply->question_id = $question_id;
        $reply->user_id = Auth::user()->id;
        $reply->reply = $request->reply;

        $reply->save();

        return redirect(route('showQuestion'));

    }

    public function showQuestion(){

        if (Auth::user()->role == 'farmer' || Auth::user()->role == 'expert'){
            $questions = Question::all();
            $injectedQuestions = [];
            foreach ($questions as $question) {
                $question->reply = Reply::where('question_id', $question->id)->orderBy('created_at')->get();
                array_push($injectedQuestions, $question);
            }
            return view('discussion',['questions' => $injectedQuestions]);
        }

        else
            return view('home');
    }

    public function updateQuestion(Request $request) {
        if ($request->editing == 'question') {
            $question = Question::find($request->id);
            $question->question = $request->val;
            $question->save();
            return "Ok";
        }
        else{
            $reply = Reply::find($request->id);
            $reply->reply = $request->val;
            $reply->save();
            return "OK";
        }
    }

}

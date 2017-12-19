<?php

namespace App\Http\Controllers;

use App\Post;
use App\Question;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()!=null){
            $questions = Question::all();
            $questionData = [];
            foreach ($questions as $question) {
                $val = strtotime($question->created_at->toDateString());
                $questionData[$val] = array_key_exists($val, $questionData) ? $questionData[$val] + 1 : 1;
            }
            $questionCountData = json_encode($questionData, JSON_UNESCAPED_SLASHES );

            $replies = Reply::all();
            $replyData = [];
            foreach ($replies as $reply) {
                $val = strtotime($reply->created_at->toDateString());
                $replyData[$val] = array_key_exists($val, $replyData) ? $replyData[$val] + 1 : 1;
            }
            $replyCountData = json_encode($replyData, JSON_UNESCAPED_SLASHES );

            $posts = Post::all();
            $postData = [];
            foreach ($posts as $post) {
                $val = $post->interest->interest;
                $postData[$val] = array_key_exists($val, $postData) ? $postData[$val] + 1 : 1;
            }
            $postCountData = json_encode($postData, JSON_UNESCAPED_SLASHES );

            $users = User::all();
            $userData = [];
            foreach ($users as $user) {
                $val = $user->role;
                $userData[$val] = array_key_exists($val, $userData) ? $userData[$val] + 1 : 1;
            }
            $userCountData = json_encode($userData, JSON_UNESCAPED_SLASHES );

            return view('home', [
                'questionCountData' => $questionCountData,
                'replyCountData' => $replyCountData,
                'postCountData' => $postCountData,
                'userCountData' => $userCountData
            ]);
        }
        else
            return view('index');
    }
}

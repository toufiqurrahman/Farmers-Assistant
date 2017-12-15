<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;

class MessageController extends Controller
{
    public function showMessage(){

        if(Auth::user()->role == 'trader') {
            $interests = Auth::user()->interests;
            $result = array();
            foreach ($interests as $interest){
                $posts = Post::where('interest_id', $interest->id)->orderByDesc('updated_at')->get();
                foreach ($posts as $post){
                    $user = $post->user()->first();
                    if ($user->role == 'farmer'){
                        array_push($result, $post);
                    }
                }
            }
            return view('message',['posts' => $result, 'type'=> 'sell', 'Role'=>'by-author']);
        }
        elseif (Auth::user()->role == 'farmer'){
            $interests = Auth::user()->interests;
            $result = array();
            foreach ($interests as $interest){
                $posts = Post::where('interest_id', $interest->id)->orderByDesc('updated_at')->get();
                foreach ($posts as $post){
                    $user = $post->user()->first();
                    if ($user->role == 'trader'){
                        array_push($result, $post);
                    }
                }
            }
            return view('message',['posts' => $result , 'type'=> 'buy', 'Role'=>'by-replier']);
        }

        else
            return view('home');
    }

    public function myPosts(){

        if(Auth::user()->role == 'trader') {
            $interests = Auth::user()->interests;
            $result = array();
            foreach ($interests as $interest){
                $posts = Post::where('interest_id', $interest->id)->orderByDesc('updated_at')->get();
                foreach ($posts as $post){
                    $user = $post->user()->first();
                    if ($user->id == Auth::user()->id){
                        array_push($result, $post);
                    }
                }
            }

            return view('my_post',['posts' => $result, 'type'=> 'buy', 'Role'=>'by-replier']);
        }
        elseif (Auth::user()->role == 'farmer'){
            $interests = Auth::user()->interests;
            $result = array();
            foreach ($interests as $interest) {
                $posts = Post::where('interest_id', $interest->id)->orderBy('updated_at')->get();
                foreach ($posts as $post) {
                    $user = $post->user;
                    if ($user->id == Auth::user()->id) {
                        array_push($result, $post);
                    }
                }
            }

            return view('my_post',['posts' => $result , 'type'=> 'sell', 'Role'=>'by-author']);
        }

        else
            return view('home');
    }

    public function update(){

    }

}


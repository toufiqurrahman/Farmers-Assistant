<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;

class MessageController extends Controller
{
    public function showMessage(){

        $interests = Auth::user()->interests;
        $result = array();
        foreach ($interests as $interest){
            $posts = Post::where('interest_id', $interest->id)->orderByDesc('updated_at')->get();
            foreach ($posts as $post){
                $user = $post->user()->first();
                if ($user->role == (Auth::user()->role == 'farmer' ? 'trader' : 'farmer')){
                    array_push($result, $post);
                }
            }
        }
        return view('my_post',['posts' => $result]);
    }

    public function myPosts(){

        $interests = Auth::user()->interests;
        $result = array();
        foreach ($interests as $interest) {
            $posts = Post::where('interest_id', $interest->id)->orderByDesc('updated_at')->get();
            foreach ($posts as $post) {
                $user = $post->user;
                if ($user->id == Auth::user()->id) {
                    array_push($result, $post);
                }
            }
        }

        return view('my_post',['posts' => $result]);
    }

    public function update(Request $request){
        $post = Post::find($request->id);
        $post->amount = $request->amount;
        $post->price = $request->price;
        $post->interest_id = $request->interest_id;

        $post->save();
        return "OK";
    }

    public function setExpire(Request $request) {
        $id = $request->id;
        $post = Post::find($id);
        $post->is_expired = 1;
        $post->save();
        return "OK";
    }

    public function deletePost(Request $request) {
        $id = $request->id;
        $post = Post::find($id);
        $post->delete();
        return "OK";
    }

}


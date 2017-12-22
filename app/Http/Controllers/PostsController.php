<?php

namespace App\Http\Controllers;

use App\Mail\EmailManager;
use App\SMS\SMSManager;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'farmer' || Auth::user()->role == 'trader') {
            return view('post');
        }
        else
            return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product' => 'required|string',
            'amount' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $post = new Post;
        $post->interest_id = $request->product;
        $post->user_id = Auth::user()->id;
        $post->amount = $request->amount;
        $post->price = $request->price;

        $post->save();

        if($post->user->role == 'farmer') {
            $recipients = $post->interest->users->where('role', 'trader');

            foreach ($recipients as $recipient) {
                $array = ['name' => $recipient->name, 'Role' => $post->user->name, 'type' => 'sell', 'product' => $post->interest->interest, 'amount' => $post->amount, 'price' => $post->price, 'email' => $post->user->email, 'phone' => $post->user->phone];
                Mail::to($recipient->email)->queue(new EmailManager($array));

                $body = "Hello " . $recipient->name . ",\n" .
                    $post->user->name . " wants to sell " . $post->interest->interest . " of " .
                    $post->amount . " kg for " . $post->price . " tk per kg.\n" .
                    "Contact with him in below listed contacts if you want to.\n" .
                    "Email: " . $post->user->email . "\n" .
                    "Mobile no.: " . $post->user->phone . "\n" .
                    "Thank You \n" .
                    "On behalf of Farmers' Assistant";
                $sms = new SMSManager();
                $sms->sendSMS($recipient->phone, $body);
            }
        }
        elseif($post->user->role == 'trader') {
            $recipients = $post->interest->users->where('role', 'farmer');

            foreach ($recipients as $recipient) {
                $array = ['name' => $recipient->name, 'Role' => $post->user->name, 'type' => 'buy', 'product' => $post->interest->interest, 'amount' => $post->amount, 'price' => $post->price, 'email' => $post->user->email, 'phone' => $post->user->phone];
                Mail::to($recipient->email)->queue(new EmailManager($array));

                $body = "Hello " . $recipient->name . ",\n" .
                    $post->user->name . " wants to buy " . $post->interest->interest . " of " .
                    $post->amount . " kg for " . $post->price . " tk per kg.\n" .
                    "Contact with him in below listed contacts if you want to.\n" .
                    "Email: " . $post->user->email . "\n" .
                    "Mobile no.: " . $post->user->phone . "\n" .
                    "Thank You \n" .
                    "On behalf of Farmers' Assistant";
                $sms = new SMSManager();
                $sms->sendSMS($recipient->phone, $body);
            }
        }



        return redirect('/home/my-post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $id->delete();

        return redirect('/home/my-post');
    }
}

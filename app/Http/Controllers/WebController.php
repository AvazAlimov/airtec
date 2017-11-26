<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Notifications\CommentNotification;

class WebController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function comment(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->contact = $request->contact;
        $message->comment = $request->comment;

        $message->notify(new CommentNotification());
        return redirect()->route('welcome');
    }
}

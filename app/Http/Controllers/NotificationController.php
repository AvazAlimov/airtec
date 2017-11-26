<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function comment(Request $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->contact = $request->contact;
        $message->comment = $request->comment;

        $message->notify(new CommentNotification());
        return view('welcome');
    }
}

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
        $message->content = $request->comment;

        $message->notify(new CommentNotification());
        return redirect()->route('home');
    }
}

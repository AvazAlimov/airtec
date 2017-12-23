<?php

namespace App\Http\Controllers;

use App\Message;
use App\Product;
use Illuminate\Http\Request;
use App\Notifications\CommentNotification;

class WebController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function catalogue()
    {
        $products = Product::all();
      
        return view('catalogue')->withProducts($products);
    }

    public function comment(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'contact'=>'required' 
        ]);
        $message = new Message($request->all());
        $message->save();
        $message->notify(new CommentNotification());
        return redirect()->route('welcome');
    }
}

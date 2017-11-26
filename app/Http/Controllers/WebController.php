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
        foreach ($products as $product)
        {
            $string = $product->image;
            $images = explode(';', $string);
            array_pop($images);
            $product->images = $images;
        }
//        dd($products);
        return view('catalogue')->withProducts($products);
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

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
    public function search(Request $request){

        if ($request->search != null || $request->search == "") {
            if (substr($request->search, 0, 1) == "#") {
                $products = Product::where('id', ltrim($request->search, '#'));
            }else {
                $products = Product::where(function ($query) use ($request) {
                    $query
                        ->whereHas('tags', function ($query) use ($request) {
                            $query->where('name', 'LIKE', "%$request->search%");
                        })
                        ->orWhere('name', 'LIKE', "%$request->search%")
                        ->orWhere('price', 'LIKE', "%$request->search%")
                        ->orWhere('info', 'LIKE', "%$request->search%");
                });
            }
            $products = $products->paginate(9);
        }else{
            $products = Product::paginate(9);
        }
        return view('catalogue')->withProducts($products);
    }
    public function show($id){
        return view('showProduct')->withProduct(Product::findOrFail($id));
    }
}

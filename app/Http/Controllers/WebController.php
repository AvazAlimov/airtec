<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\OrderNotification;
use App\Order;
use App\Product;
use App\Tag;
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
        $products = Product::paginate(9);
        $tags = Tag::all();
        return view('catalogue')->withProducts($products)->withTags($tags);
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
        $products = Product::orderBy('id', 'desc');
        if ($request->search != null || $request->search != "") {

            if (substr($request->search, 0, 1) == "#") {
                $products = $products->where('id', ltrim($request->search, '#'));
            }else {
                $products = $products->where(function ($query) use ($request) {
                    $query->whereHas('tags', function ($query) use ($request) {
                            $query->where('name', 'LIKE', "%$request->search%");
                        })
                        ->orWhere('name', 'LIKE', "%$request->search%")
                        ->orWhere('price', 'LIKE', "%$request->search%")
                        ->orWhere('info', 'LIKE', "%$request->search%");
                });
            }
        }
        if($request->tag != null || $request->tag != ""){
            $products = $products->where(function ($query) use ($request) {
                $query->whereHas('tags', function ($query) use ($request) {
                    $query->where('id', $request->tag);
                });
            });
        }
        $products = $products->paginate(9);
        return view('catalogue')->withProducts($products)->withTags(Tag::all());
    }
    public function show($id){
        $product = Product::findOrFail($id);
        $product->view_count = $product->view_count + 1;
        $product->save();
        return view('showProduct')->withProduct($product);
    }
    public function order(Request $request, $id){
        $request->validate([
           'name' => 'required',
            'phone' => 'required',
            'number' =>'required'
        ]);
        $product = Product::findOrFail($id);

        $order = new Order($request->all());
        $order->product_id = $product->id;
        $order->save();
        $order->notify(new OrderNotification($product));
        $product->order_count = $product->order_count + 1;
        $product->save();
        return redirect()->back()->with('message', "Sizning so'rovingiz qabul qilindi, siz bilan aloqaga chiqamiz");
    }
}

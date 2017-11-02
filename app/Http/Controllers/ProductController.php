<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->info = $request->info;
        $product->image = $request->image;

        $product->save();

        return redirect()->intended(route('home'));
    }
}

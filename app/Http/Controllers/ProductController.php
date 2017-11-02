<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $product->image = "";

        $files = $request->file('image');

        if($files != null)
            foreach ($files as $image) {
                Storage::put($image->getClientOriginalName(), file_get_contents($image));
                $product->image .= $image->getClientOriginalName().";";
            }

        $product->save();

        return redirect()->intended(route('home'));
    }
}

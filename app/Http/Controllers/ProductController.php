<?php

namespace App\Http\Controllers;

use App\Product;
use App\Point;
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

        if ($files != null)
            foreach ($files as $image) {
                try {
                    /** @noinspection PhpUndefinedMethodInspection */
                    Storage::put($image->getClientOriginalName(), file_get_contents($image));
                    /** @noinspection PhpUndefinedMethodInspection */
                    $product->image .= $image->getClientOriginalName() . ";";
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }

        $product->save();

        foreach ($request->tags as $tag) {
            $point = new Point;
            $point->tag_id = $tag;
            $point->product_id = $product->id;
            $point->save();
        }

        return redirect()->intended(route('home'));
    }
}
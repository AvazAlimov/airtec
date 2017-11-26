<?php

namespace App\Http\Controllers;

use App\Product;
use App\Point;
use App\Tag;
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
                    $image->move(public_path('images/'), $image->getClientOriginalName());
//                    Storage::put($image->getClientOriginalName(), file_get_contents($image));
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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = Product::findOrFail($id);
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

        Point::where('product_id', '=', $product->id)->delete();

        foreach ($request->tags as $tag) {
            $point = new Point;
            $point->tag_id = $tag;
            $point->product_id = $product->id;
            $point->save();
        }

        $product->save();

        return redirect()->intended(route('home'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->intended(route('home'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $tags = Tag::all();
        $points = Point::select('tag_id')->where('product_id', '=', $product->id)->get();

        return view('product')
            ->withProduct($product)
            ->withTags($tags)
            ->withPoints($points);
    }
}
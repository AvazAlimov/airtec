<?php

namespace App\Http\Controllers;

use App\Product;
use App\Point;
use App\Tag;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as LaravelFile;
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
            'price' => 'required',            
            'info' => 'required',
            'tags.*.id'=>'integer|exists:tags',
        ]);

        $product = new Product($request->except('files'));

        /*if ($files != null)
            foreach ($files as $image) {
            try {
                $image->move(public_path('images/'), $image->getClientOriginalName());
                $product->image .= $image->getClientOriginalName() . ";";
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }*/
        $product->save();
         if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $upload_folder = '/images/img' . $product->id. '/';
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $fil->path = $upload_folder;
                $product->images()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $product->tags()->sync($request->tags, false);

        return redirect()->intended(route('home'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'info' => 'required',
            'tags.*.id'=>'integer|exists:tags',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->info = $request->info;
        $product->save();
        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $upload_folder = '/images/img' . $product->id. '/';
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $fil->path = $upload_folder;
                $product->images()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        } 
        $product->tags()->sync($request->tags, true);
        return redirect()->intended(route('home'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        foreach ($product->files as $file) {
            LaravelFile::delete(public_path().$product->file->path.$product->file->file);
        }
        $tags = $product->tags()->detach();
        $product->files->delete();

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
    public function deleteFile($id){
        $file = File::find($id);
        LaravelFile::delete(public_path().$file->path.$file->file);
        return redirect()->back();
    }
}
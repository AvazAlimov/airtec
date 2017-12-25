<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $top_products= Tag::find(1)->products()->orderBy('total_count', 'desc')->take(5)->get();

        $products = Product::all();

        /** @noinspection PhpUndefinedMethodInspection */
        return view('home')
            ->withTags($tags)
            ->withProducts($products)->withTopprod($top_products);
    }
}

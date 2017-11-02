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
        $products = Product::all();

        /** @noinspection PhpUndefinedMethodInspection */
        return view('home')
            ->withTags($tags)
            ->withProducts($products);
    }
}

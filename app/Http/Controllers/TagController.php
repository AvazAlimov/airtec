<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        return redirect()->intended(route('home'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id' => 'required'
        ]);

        $tag = Tag::find($request->id);
        $tag->name = $request->name;
        $tag->save();

        return redirect()->intended(route('home'));
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->intended(route('home'));
    }
}

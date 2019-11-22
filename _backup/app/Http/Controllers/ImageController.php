<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hash' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = null;

        if(isset(request()->image)) {
            $imageName = time().$request->hash.'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
            $image = new Image;
            $image->name = $imageName;
            $image->post_hash = trim($request->hash);
            $image->save();
            return "http://127.0.0.1:8000/images/".$imageName;
        }
    }
}

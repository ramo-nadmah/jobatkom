<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function create()
    {

        return view('images.create');

    }
    public function store(Request $request)
    {
        $path=$request->file('image')->store('images','s3');
//        dd($path);

        Storage::disk('s3')->setVisibility($path,'public');
        $source=Storage::disk('s3')->url($path);

        return view('test',compact(['source']));
    }
    public function show(Image $image)
    {
//        return Storage::disk('s3')->respo
    }
}

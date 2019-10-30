<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $this->validate($request, [
            'image_title' => 'image|nullable|max:199999'
        ]);


        //handle File Upload
        //dd($request->hasFile('image_title'));
        if ($request->hasFile('image_title')) {
            #Get File name with extension
            $fileNameWithExt = $request->file('image_title')->getClientOriginalName();
            #Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            #Get Extension
            $extension = $request->file('image_title')->getClientOriginalExtension();
            #File To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            #Upload image

            $path = $request->file('image_title')->storeAs('public/img', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $image = new Image;
        //dd($image);
        $image->title = $fileNameToStore;
        $image->post_id = $request->post_id;
        $image->save(); /**/
        $ip = " -";

        return redirect()->back()->with('message', "Image added Successful $ip");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return View::make('images/edit', array('post' => $post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        if ($image->title != 'noimage.jpg') {
            Storage::delete('public/img/' . $image->title);
        }

        $image->delete();
        return redirect()->back()->with('message', 'Image Deleted updated!');
        //dd($id);
    }
}

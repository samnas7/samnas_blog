<?php

namespace App\Http\Controllers;

use App\Video;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use View;

class VideosController extends Controller
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

        $this->validate($request, [
            'video' => 'mimes:mp3,mpeg,mp4,3gp|nullable|max:199999'
        ]);
        /*
*/
        //handle File Upload
        //dd($request->hasFile('video'));
        if ($request->hasFile('video')) {
            #Get File name with extension
            $fileNameWithExt = $request->file('video')->getClientOriginalName();
            #Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            #Get Extension
            $extension = $request->file('video')->getClientOriginalExtension();
            #File To Store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            #Upload video

            $path = $request->file('video')->storeAs('public/videos', $fileNameToStore);
        } else {
            $fileNameToStore = 'novideo.jpg';
        }
        $video = new Video;
        //dd($video);
        $video->title = $fileNameToStore;
        $video->post_id = $request->post_id;
        $video->save();
        return redirect()->back()->with('message', 'video added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        dd($video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return View::make('videos/edit', array('post' => $post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if ($video->title != 'novideo.jpg') {
            Storage::delete('public/videos/' . $video->title);
        }

        $video->delete();
        return redirect()->back()->with('message', 'Video Deleted updated!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepliesController extends Controller
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'string|max:255',
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $reply = new Reply;
        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->message = $request->body;
        $reply->comment_id = $request->comment_id;
        $reply->save();
        return redirect()->back()->with('reply_message', 'Response inserted successful, Please dowait for admin to check your response');
        //dd($request);
        /* name	email	message	comment_id	status */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);


        $reply = Reply::find($id);
        $reply->status =  $request->get('status');
        $reply->save();
        return redirect()->back()->with('success', 'replies updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $reply->delete();
        return redirect()->back()->with('success', 'replies updated!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Type;
use App\Image;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* if (Auth::user()->roles) {
            foreach (Auth::user()->roles as $role) {
                dd($role->pivot);
            }
        } */
        //ll
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $types = Type::all();
        //dd($post);
        return View::make('posts/create', array('categories' => $categories, 'types' => $types));
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
        //dd(Auth::user()->id);
        $post = new Post;
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'string|max:255',
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->type_id = $request->type;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->back()->with('message', 'Post inserted successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$user = auth()->user();
        //$images = Image::where(['post_id','=',$post->id]);
        $comments = Comment::where([['post_id', '=', $post->id], ['status', '=', 0]])->first();

        //dd($comments);
        return View::make('posts/show', array('post' => $post, 'comnts' => $comments));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $post = Post::find($id);
        $categories = Category::all();
        $types = Type::all();
        //dd($post);
        return View::make('posts/edit', array('post' => $post, 'categories' => $categories, 'types' => $types));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /**/
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'string|max:255',
            ]
        );
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->type_id = $request->type;
        $post->save();
        return redirect()->route('posts.show', $id)->with('message', 'Post inserted successful');

        //dd($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post = Post::find($post->id);
        //dd($post->images);
        $post->images->each->delete();
        $post->videos->each->delete();
        $post->comments->each->delete();
        $post->delete();
        return redirect('/');
    }
}

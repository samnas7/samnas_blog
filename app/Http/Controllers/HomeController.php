<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Category;
use App\Type;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $category = Category::all();
        $type = Type::all();
    }

    /**
     * Show the application dashboard.
     *

     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);


        $sidePost = Post::where("created_at", ">", Carbon::now()->subWeeks(1))->orderBy('created_at', 'desc')->limit(10)->get();

        return view('index', ['posts' => $posts, 'sidePost' => $sidePost]);
    }
    public function posts($type_id, $category_id)
    {
        //dd($category_id, $type_id);
        $posts = Post::where([['type_id', '=', $type_id], ['category_id', '=', $category_id]])->paginate(10);
        return view('posts/posts', ['posts' => $posts]);
    }
}

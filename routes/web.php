<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/posts/{type_id}/{category_id}', 'HomeController@posts')->name('posts.type.category');

Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController', [
    'except' => ['index', 'create']
])->names([
    'store' => 'comments.store'
]);

Route::resource('replies', 'RepliesController');
Route::resource('images', 'ImagesController');
Route::resource('videos', 'VideosController');

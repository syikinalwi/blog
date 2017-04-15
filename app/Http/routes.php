<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/contact', function () {
    return view('contact');
});


Route::get('/about', function () {
    return view('about');
});
*/



Route::get('/about', 'PageController@showAboutPage');
Route::get('/contact', 'PageController@showContactPage');

Route::get('/admin/dashboard', 'AdminController@showAdminDashboard');
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/post', ['as' => 'post.index', 'uses' => 'PostController@showAllPosts']);

Route::get('/post/create', ['as' => 'post.create', 'uses' => 'PostController@createPost']);
Route::post('/post/create/save', ['as' => 'posts.create.save', 'uses' => 'PostController@savePost']);
Route::get('/post/edit/{id}', ['as' => 'posts.edit', 'uses' => 'PostController@editPost']);
Route::get('/post/delete/{id}', ['as' => 'posts.delete', 'uses' => 'PostController@deletePost']);

Route::resource('blog', 'BlogController');

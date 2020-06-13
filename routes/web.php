<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Admin routes
Route::group(['prefix' => 'admin/blog', 'namespace' => 'Blog\Admin', 'middleware' => 'admin'], function () {
    Route::resource('categories', 'CategoryController')
        ->except(['show'])
        ->names('blog.admin.categories');

    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');

    Route::resource('users', 'UserController')
        ->names('blog.admin.users');
});

//Default routes
Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
//    Route::resource('posts', 'PostController')
//        ->names('blog.posts');

//    Post Routes
    Route::resource('posts', 'PostController')
        ->only(['create', 'store'])
        ->middleware('auth')
        ->names('blog.posts');

    Route::resource('posts', 'PostController')
        ->only(['edit', 'update', 'destroy'])
        ->middleware('has.article')
        ->names('blog.posts');

    Route::resource('posts', 'PostController')
        ->only(['show', 'index'])
        ->names('blog.posts');

//
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

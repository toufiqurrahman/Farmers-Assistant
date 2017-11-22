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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function (){
    return view('index' );
});

Auth::routes();

Route::post('/home/add_expert', 'AddExpertController@storeUser');

Route::post('/home/profile/edit', 'UpdateProfileController@storeBasicInformation');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home/communication', function(){
    return view('gruveo');
});

Route::get('/home/discussion', function (){
    return view('discussion');
});

Route::get('/home/post', function(){
    return view('post');
});

Route::get('/home/profile', 'ProfileController@index');

Route::get('/home/profile/edit', 'ProfileController@edit');

Route::get('/home/post/create', 'PostsController@create');

Route::get('/home/add_expert', function(){
    return view('/admin/add_expert');
});

Route::get('/home/delete_expert', function(){
    return view('/admin/delete_expert');
});
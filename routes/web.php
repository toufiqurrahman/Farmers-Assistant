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


Route::get('/', ['uses' => 'HomeController@index']);

Auth::routes();

Route::post('/home/add_expert', 'AddExpertController@storeUser');

Route::post('/home/profile/edit', 'UpdateProfileController@storeBasicInformation');

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('/home/communication', ['uses' => 'CommunicationController@index']);

Route::get('/home/discussion', array('uses' => 'DiscussionSectionController@showQuestion', 'as' => 'showQuestion'));
Route::post('/home/discussion/question', array('uses' => 'DiscussionSectionController@storeQuestion', 'as' => 'storeQuestion'));
Route::post('/home/discussion/reply/{question_id}', array('uses' => 'DiscussionSectionController@storeReply', 'as' => 'storeReply'));
Route::put('/home/discussion/question/update', array('uses' => 'DiscussionSectionController@updateQuestion', 'as' => 'updateQuestion'));

Route::get('/home/post', 'PostsController@index');

Route::get('/home/profile', 'ProfileController@index');

Route::get('/home/profile/edit', 'ProfileController@edit');

Route::get('/home/post/create', 'PostsController@index');

Route::get('/home/add_expert', 'AddExpertController@index');

Route::get('/home/delete_expert', ['uses' => 'AddExpertController@showDeleteExpertForm', 'as' => 'delete_expert']);

Route::get('/home/manage_farmers', ['uses' => 'ManageUsersController@viewFarmers']);
Route::get('/home/manage_traders', ['uses' => 'ManageUsersController@viewTraders']);
Route::delete('/home/users/{id}', ['uses' => 'ManageUsersController@deleteUser', 'as' => 'deleteUser']);

Route::post('/home/post', 'PostsController@store');

Route::get('/home/add_interest','InterestController@showAddInterestForm');

Route::get('/home/delete_interest','InterestController@showDeleteInterestForm');

Route::post('/home/delete_interest','InterestController@DeleteInterest');

Route::post('/home/add_interest','InterestController@AddInterest');

Route::get('/home/change-password', 'ChangePasswordController@showPasswordChangeForm');

Route::post('/home/change-password', 'ChangePasswordController@changePassword');

Route::get('/home/message', 'MessageController@showMessage');

Route::get('/home/my-post', 'MessageController@myPosts');
Route::put('/home/posts', ['uses' => 'MessageController@setExpire', 'as' => 'setExpire']);
Route::put('/home/posts/edit', ['uses' => 'MessageController@update', 'as' => 'postUpdate']);
Route::delete('/home/posts', ['uses' => 'MessageController@deletePost', 'as' => 'postDelete']);

Route::get('/home/delete-post', 'PostsController@destroy');

Route::get('/home/gruveo/{expert_id?}', ['uses' => 'CommunicationController@getGruveoToken', 'as' => 'gruveoToken']);

Route::get('/home/send-mail/{to}/{body}', ['uses' => 'EmailController@sendMail', 'as' =>'sendMail']);
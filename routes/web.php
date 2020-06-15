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
    return view('front.home');
});



Route::get('/konselor', function () {
    return view('front.konselor');
});

Route::get('/forum', function () {
    return view('front.forum');
});

Route::get('/forumdetail', function () {
    return view('front.forumdetail');
});

Route::get('/kontak', function () {
    return view('front.kontak');
});

Route::get('/kuis', function () {
    return view('front.kuis');
});

Route::get('/login1', function () {
    return view('front.login');
});


Route::get('/dbkonselor', function () {
    return view('backend.konselor.dashboard');
}); 

 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route::group(['prefix' => 'admin'], function () {
    
})->middleware('auth'); */
Route::resource('/chat', 'ChatController');
Route::post('/chat/send', 'ChatController@sendMessage');
Route::get('/chats', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::get('messages/{user}', 'ChatsController@fetchMessagesUser');
Route::post('messages/{user}', 'ChatsController@sendMessageUser');

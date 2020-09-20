<?php

use App\Events\WebsocketDemoEvent;
use Illuminate\Support\Facades\Auth;
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
    broadcast(new WebsocketDemoEvent('some data'));

    return view('welcome');
});

Route::get('/chats', 'ChatsController@index');
Route::get('/users', 'ChatsController@fetchUsers');
Route::get('/privatechat', 'ChatsController@private');

Route::get('/getmessages', 'ChatsController@fetchMessages');
Route::get('/getprivate_messages/{user}', 'ChatsController@fetchprivateMessages');
Route::post('/sendmessages', 'ChatsController@sendMessage');
Route::post('/sendprivate-messages/{user}', 'ChatsController@sendprivateMessage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
